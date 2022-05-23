<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\QuotationDetails;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class FinancialOperationsServices
{
  //********* Get Invoice *********//
  public static function getInvoice($orderID, $destination)
  {
    $invoice  = Invoice::where('order_id', $orderID)->first();
    $order    = Order::find($invoice->order->id);

    if ($invoice && $order)
    {
      $address  = Address::firstWhere('id', $invoice->address_id);
      $products = QuotationDetails::Where('quotation_id', $order->quotation->id)->get();
      $user     = $order->user;
      $pharmacy = $order->pharmacy->pharmacy;

    }
    else return 'false';

    return view($destination.'.invoice',
      compact('invoice', 'order', 'pharmacy', 'user', 'products', 'address'));
  }

  //********* get all financial operations *********//
  public static function getFinancialOperations($destination)
  {
    $user                  = Auth::user();
    $transactions          = Transaction::where('payable_id', $user->id)->get();
    $amount_confirmed      = Transaction::where('payable_id', $user->id)->where('confirmed', 1)->sum('amount');
    $amount_not_confirmed  = Transaction::where('payable_id', $user->id)->where('confirmed', 0)->sum('amount');
    $invoice_confirmed     = Transaction::where('payable_id', $user->id)->where('confirmed', 1)->count('amount');
    $invoice_not_confirmed = Transaction::where('payable_id', $user->id)->where('confirmed', 0)->count('amount');

    return view($destination.'.financial-operations',
      compact('user', 'transactions', 'amount_confirmed','amount_not_confirmed', 'invoice_confirmed', 'invoice_not_confirmed'));
  }

}
