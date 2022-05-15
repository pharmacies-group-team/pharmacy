<?php

namespace App\Services;

use App\Enum\OrderEnum;
use App\Enum\PaymentEnum;
use App\Enum\RoleEnum;
use App\Enum\SettingEnum;
use App\Models\Invoice;
use App\Models\QuotationDetails;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentServices
{

    //********* Payment from the wallet *********//
    public static function paymentFromWallet($amount, $quotation, $addressID): RedirectResponse
    {
      $invoice = self::createInvoice($quotation, $addressID);
      self::processWallet($amount, $invoice, $quotation);

      $invoice->update(['is_active' => 1]);
      $quotation->order->update(['status' => OrderEnum::PAID_ORDER]);

      // send and save notification in DB
      NotificationService::userPay($quotation->order);

      return redirect()->route('client.success')
        ->with('message', 'تمت عملية الدفع بنجاح، طلبك قيد التجهيز..');
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
    public static function processWallet($amount, $invoice, $quotation)
    {
      $pharmacy = User::find($quotation->order->pharmacy_id);
      $admin    = User::role(RoleEnum::SUPER_ADMIN)->first();

      $adminRatio = ( PaymentEnum::RATIO / 100 ) * $amount;
      $residual   = $amount - $adminRatio;

      Auth::user()->withdraw($amount,
        [
          'invoice_id' => $invoice->id,
          'depositor'  => Auth::id(),
          'recipient'  => $pharmacy->id,
          'state'      => ' تحويل من حساب ( '.Auth::user()->name.') إلى حساب ( . ' . $pharmacy->name . '('
        ]);

      $admin->deposit($adminRatio,
        [
          'invoice_id' => $invoice->id,
          'depositor'  => Auth::id(),
          'recipient'  => $admin->id,
          'state'      => ' إيداع إلى حساب ( '.$admin->name.') من حساب ( . ' . Auth::user()->name . '('
        ]);

      $pharmacy->deposit($residual,
        [
          'invoice_id' => $invoice->id,
          'user_id'    => Auth::id(),
          'pharmacy'   => $quotation->order->pharmacy_id,
          'state'      => ' إيداع إلى حساب ( '.$pharmacy->name.') من حساب ( . ' . Auth::user()->name . '('
        ]);
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
