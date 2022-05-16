<?php

namespace App\Http\Controllers\client;

use App\Enum\OrderEnum;
use App\Enum\PaymentEnum;
use App\Enum\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\QuotationDetails;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //********* Success Payment *********//
    public function success($data)
    {
      $data = base64_decode($data);

      //  TODO (STATIC DATA)
      $invoiceID = 'ODJrDrF0BE';

      $invoice  = Invoice::firstWhere('invoice_id', $invoiceID);
      $order    = Order::find($invoice->order->id);

      if ($order->status == OrderEnum::UNPAID_ORDER)
      {
        $invoice->update(['is_active' => 1]);
        $order->update(['status' => OrderEnum::PAID_ORDER]);

        $this->processWallet($invoice, $order);

        // send and save notification in DB
        NotificationService::userPay($invoice->order);
      }

//      return response($products);
      return $this->getInvoice($invoiceID);
    }

    //********* Cancel Payment *********//
    public function cancel()
    {
      return 'cancel';
    }

    //********* Show Invoice *********//
    public function getInvoice($invoiceID)
    {
      $invoice  = Invoice::where('invoice_id', $invoiceID)->orWhere('id', $invoiceID)->first();
      $order    = Order::find($invoice->order->id);

      if ($invoice && $order)
      {
        $address  = Address::firstWhere('id', $invoice->address_id);
        $products = QuotationDetails::Where('quotation_id', $order->quotation->id)->get();
        $user     = $order->user;
        $pharmacy = $order->pharmacy->pharmacy;

      }
      else return 'false';

      return view('client.invoice',
        compact('invoice', 'order', 'pharmacy', 'user', 'products', 'address'));
    }

    //********* Process Payment from the wallet *********//
    public function processWallet($invoice, $order)
    {
      $user     = $order->user;
      $pharmacy = $order->pharmacy;
      $admin    = User::role(RoleEnum::SUPER_ADMIN)->first();

      $adminRatio = ( PaymentEnum::RATIO / 100 ) * $invoice->total;
      $residual   = $invoice->total - $adminRatio;

      $user->withdraw(0,
        [
          'invoice_id' => $invoice->id,
          'depositor'  => $user->id,
          'recipient'  => $pharmacy->id,
          'state'      => ' تحويل من حساب ( '.$user->name.') إلى حساب ( . ' . $pharmacy->name . '('
        ]);

      $pharmacy->deposit($residual,
        [
          'invoice_id' => $invoice->id,
          'depositor'  => Auth::id(),
          'recipient'  => $pharmacy->id,
          'state'      => ' إيداع إلى حساب ( '.$pharmacy->name.') من حساب ( . ' . $user->name . '('
        ]);

      $admin->deposit($adminRatio,
        [
          'invoice_id' => $invoice->id,
          'depositor'  => $user->id,
          'recipient'  => $admin->id,
          'state'      => ' إيداع إلى حساب ( '.$admin->name.') من حساب ( . ' . $user->name . '('
        ]);

    }
}
