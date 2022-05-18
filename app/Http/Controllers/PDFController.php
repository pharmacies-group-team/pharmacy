<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\QuotationDetails;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
  public function generateInvoicePDF($orderID)
  {
    $invoice  = Invoice::where('order_id', $orderID)->first();
    $order    = Order::find($invoice->order->id);

    $address = Address::firstWhere('id', $invoice->address_id);
    $products = QuotationDetails::Where('quotation_id', $order->quotation->id)->get();
    $user = $order->user;
    $pharmacy = $order->pharmacy->pharmacy;

    $data = [
      'title' => 'فاتورة شراء',
      'date' => date('m/d/Y'),
      'invoice' => $invoice,
      'order'  => $order,
      'address' => $address,
      'user' => $user,
      'products' => $products,
      'pharmacy' => $pharmacy
    ];

    $pdf = PDF::loadView('report.invoicePDF', $data);

    return $pdf->download('test.pdf');
  }
}
