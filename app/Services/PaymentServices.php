<?php

namespace App\Services;

use App\Enum\OrderEnum;
use App\Enum\PaymentEnum;
use App\Enum\RoleEnum;
use App\Enum\SettingEnum;
use App\Models\Invoice;
use App\Models\QuotationDetails;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentServices
{

    //********* Payment from the wallet *********//
    public static function paymentFromWallet($amount, $quotation, $addressID)
    {
      try {

        $invoice = self::createInvoice($quotation, $addressID);

        // send and save notification in DB
        NotificationService::userPay($quotation->order);

        self::processWallet($amount, $invoice);

        $invoice->update(['is_active' => 1]);
        $quotation->order->update(['status' => OrderEnum::PAID_ORDER]);

        return redirect()->route('client.success', $quotation->order->id)
          ->with('message', 'تمت عملية الدفع بنجاح، طلبك قيد التجهيز..');
      }
      catch (ConnectionException $e) {
        return redirect()->back()->with(['message' => 'لقد استغرقت العمليه اطول من الوقت المحدد لها يرجى إعادة المحاولة']);
      }
      catch (\Exception $th){
        return redirect()->back()->with(['message' => 'فشلت عملية الدفع، تأكد من إتصال النت..']);
      }
    }

    //********* Payment from the API *********//
    public static function paymentFromAPI($quotation, $quotationID, $addressID)
    {
      $response = Http::retry(3, 100)->withHeaders(
        [
          'content-Type' => 'application/x-www-form-urlencoded',
          'private-key'  => PaymentEnum::PRIVATE_KEY,
          'public-key'   => PaymentEnum::PUBLIC_KEY,
        ])
        ->post(PaymentEnum::WASL_API, self::data($quotation, $quotationID));

      if ($response->serverError()) {
        session()->flash('message', 'يبدو أن هناك خطأ في السيرفر...');
      }
      if ($response->successful()) {
        self::createInvoice($quotation, $addressID, $response);
        return redirect($response['invoice']['next_url']);
      }
    }

    //********* Process Payment from the wallet *********//
    public static function processWallet($amount, $invoice)
    {
      $pharmacy = User::find($invoice->order->pharmacy_id);
      $admin    = User::role(RoleEnum::SUPER_ADMIN)->first();
      $user     = Auth::user();

      $adminRatio = ( PaymentEnum::RATIO / 100 ) * $amount;
      $residual   = $amount - $adminRatio;

      // The first step: withdraw amount from the user
      Auth::user()->forceWithdraw($amount,
        [
          'invoice_id' => $invoice->id,
          'order_id'   => $invoice->order->id,
          'state_1'    => 'تم السحب من حساب ',
          'depositor'  => $user->name,
          'state_2'    => ' الى حساب ',
          'recipient'  => $pharmacy->name,
        ]);

      // The second step: withdraw amount from the pharmacy
      $transaction = $pharmacy->deposit($residual,
        [
          'invoice_id' => $invoice->id,
          'order_id'   => $invoice->order->id,
          'state_1'    => 'تم الايداع من حساب ',
          'depositor'  => $user->name,
          'state_2'    => ' الى حساب ',
          'recipient'  => $pharmacy->name,
        ], false);

      Transaction::find($transaction->id)->update(['order_id' => $invoice->order->id]);

      // The third step: deduct the percentage  and deposit it to the admin
      $admin->deposit($adminRatio,
        [
          'invoice_id' => $invoice->id,
          'order_id'   => $invoice->order->id,
          'state_1'    => 'تم إيداع نسبة من فاتورة بيع ',
          'depositor'  => $pharmacy->name,
          'state_2'    => ' الى حسابك ',
          'recipient'  => $admin->name,
        ]);

      // Second Step: Send a notification to the pharmacy and admin
      NotificationService::transferAmountFromUser($invoice->order);
      NotificationService::transferAmountToPharmacy($invoice->order);
      NotificationAdminService::transferAmountToPharmacy($invoice->order);
    }

    //********* The data sent for API payment *********//
    public static function data($quotation, $quotationID)
    {
      $products = QuotationDetails::where('quotation_id', $quotationID)
        ->select('id', 'product_name', 'quantity', 'price As unit_amount')->get();

      return
        [
          'order_reference' => (string) $quotation->order->id,
          'products'        => $products,
          'currency'        => 'YER',
          'total_amount'    => (string) $quotation->total,
          'success_url'     => SettingEnum::DOMAIN.'client/success',
          'cancel_url'      => SettingEnum::DOMAIN.'client/cancel',
          'metadata'        => $quotation->order->user
        ];
    }

    //********* Create Invoice *********//
    public static function createInvoice($quotation, $addressID, $response = null)
  {
    return Invoice::updateOrCreate(['order_id'   => $quotation->order->id],
      [
        'total'      => $quotation->total,
        'invoice_id' => $response != null ? $response['invoice']['invoice_referance'] : '',
        'address_id' => $addressID
      ]);
  }
}
