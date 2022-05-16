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
      $data = base64_decode($data);

      //  TODO (STATIC DATA)
      $invoiceID = '2a1bwrepFq';

      $invoice  = Invoice::firstWhere('invoice_id', $invoiceID);
      $order    = Order::find($invoice->order->id);

      if ($order->status == OrderEnum::UNPAID_ORDER)
      {
        $invoice->update(['is_active' => 1]);
        $order->update(['status' => OrderEnum::PAID_ORDER]);

        PaymentServices::processWallet($invoice->total, $invoice);

        // send and save notification in DB
        NotificationService::userPay($invoice->order);
      }

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
      return FinancialOperationsServices::getInvoice($invoiceID, 'client');
    }
}
