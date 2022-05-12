<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
//  TODO IT MIGHT BE DELETED
//  public function payment(Request $request)
//  {
//    $products = QuotationDetails::where('quotation_id', $request->quotation_id)
//      ->select('id', 'product_name', 'quantity', 'price As unit_amount')->get();
//
//    $quotation = Quotation::find($request->quotation_id)->first();
//
//    $paymentData =
//      [
//        'order_reference' => (string) $quotation->order->id,
//        'products'        => $products,
//        'currency'        => 'YER',
//        'total_amount'    => (string) $quotation->total,
//        'success_url'     => 'http://127.0.0.1:8000/client/success',
//        'cancel_url'      => 'http://127.0.0.1:8000/client/cancel',
//        'metadata'        => $quotation->order->user
//      ];
//
//    $secretKey      = 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et';
//    $publishableKey = 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy';
//
//    $waselAPI = 'https://waslpayment.com/api/test/merchant/payment_order';
//
//   $response = Http::withHeaders([
//      'content-Type' => 'application/x-www-form-urlencoded',
//      'private-key' => $secretKey,
//      'public-key' => $publishableKey,
//    ])->post($waselAPI, $paymentData);
//
//    return $response ;
//
//    if ($response->status() == '200') {
//
//      Invoice::updateOrCreate(['order_id'   => $quotation->order->id],
//        [
//          'total'      => $quotation->total,
//          'invoice_id' => $response['invoice_referance'],
//        ]);
//
//      return redirect($response['next_url']);
//    }
//
//  }

  public function cancel()
  {
    return 'cancel';
  }

  public function success()
  {
    // TODO ahlam invoice

    return view('client.invoice');
  }
}
