<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\QuotationDetails;

class FinancialOperationsServices
{
  //********* Get Invoice *********//
  public static function getInvoice($invoiceID)
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

}
