<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PayController extends Controller
{
    public function payment(Request $request)
    {
      $products = QuotationDetails::where('quotation_id', $request->quotation_id)
        ->select('id', 'product_name As name', 'quantity', 'price As unit_amount')->get();

      if ($products->count() === 0) {
        dd('??');
      }
      else{

        $quotation = Quotation::find($request->quotation_id)->first();

        $paymentData =
        [
          'order_reference' => (string) $quotation->order->id,
          'products'        => $products,
          'currency'        => 'YER',
          'total_amount'    => (string) $quotation->total,
          'success_url'     => 'http://127.0.0.1:8000/client/success',
          'cancel_url'      => 'http://127.0.0.1:8000/client/cancel',
          'metadata'        => $quotation->order->user
        ];

        return response($paymentData);

        $secretKey      = 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et';
        $publishableKey = 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy';

        $waselAPI = 'https://waslpayment.com/api/test/merchant/payment_order';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $waselAPI,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $paymentData,
            CURLOPT_HTTPHEADER => array(
              'content-Type: application/x-www-form-urlencoded',
              'private_key:' . $secretKey,
              'public_key:' . $publishableKey,
          ),
        ));

        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {return ['result' => 'error', 'message' => $err];}
        else {
          $response = json_decode($result, true);
          return $response;
        }
      }



    }


//    public function paymesnt(Request $request)
//    {
//      $products = QuotationDetails::where('quotation_id', $request->quotation_id)
//        ->select('id', 'product_name As name', 'quantity', 'price As unit_amount')->get();
//
//      $quotation = Quotation::find($request->quotation_id)->first();
//
//      $paymentData =
//        [
//          'order_reference' => (string) $quotation->order->id,
//          'products'        => $products,
//          'currency'        => 'YER',
//          'total_amount'    => (string) $quotation->total,
//          'success_url'     => 'http://127.0.0.1:8000/client/success',
//          'cancel_url'      => 'http://127.0.0.1:8000/client/cancel',
//          'metadata'        => $quotation->order->user
//        ];
//
//      $secretKey      = 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et';
//      $publishableKey = 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy';
//
//      $waselAPI = 'https://waslpayment.com/api/test/merchant/payment_order';
//
//     return Http::withHeaders([
//        'content-Type' => 'application/x-www-form-urlencoded',
//        'private_key' => $secretKey,
//        'public_key' => $publishableKey,
//      ])->post($waselAPI, $paymentData);
//
////      dd($response->status());
//    }

    public function cancel()
    {
      return 'cancel';
    }

    public function success()
    {
      return 'success';
    }
}
