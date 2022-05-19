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
use App\Services\FinancialOperationsServices;
use App\Services\NotificationService;
use App\Services\PaymentServices;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //********* Success Payment *********//
    public function success($data)
    {
      $info=base64_decode($data);
      $data=json_decode($info,true);

      $order_id = $data['order_reference'];

      $order    = Order::find($order_id);
      $invoice  = $order->invoice;

      if ($order->status == OrderEnum::UNPAID_ORDER)
      {
        $invoice->update(['is_active' => 1]);
        $order->update(['status' => OrderEnum::PAID_ORDER]);

        PaymentServices::processWallet($invoice->total, $invoice);

        // send and save notification in DB
        NotificationService::userPay($invoice->order);
      }

      return $this->getInvoice($order_id);
    }

    //********* Cancel Payment *********//
    public function cancel()
    {
      return redirect()->route('client.orders.index');
    }

    //********* Show Invoice *********//
    public function getInvoice($orderID)
    {
      return FinancialOperationsServices::getInvoice($orderID, 'client');
    }
}
