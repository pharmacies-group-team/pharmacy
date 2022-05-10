<?php

namespace App\Http\Controllers\client;

use App\Enum\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PayController extends Controller
{
    public function pawyment(Request $request)
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

//        return response($paymentData);

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


    public function payment(Request $request)
    {
      $products = QuotationDetails::where('quotation_id', $request->quotation_id)
        ->select('id As id', 'product_name As product_name', 'quantity As quantity', 'price As unit_amount')->get();

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

//      return response($products);
//      $private_key      = 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et';
//      $public_key       = 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy';

      $waselAPI = 'https://10.0.0.126:8000/api/test/merchant/payment_order';

      $data  = json_encode( [
        'order_reference' => (string) $quotation->order->id,
        'products' => $products,
        'total_amount' => (string) $quotation->total,
        'currency' => 'YER',
        'success_url' => 'http://127.0.0.1:8000/client/success',
        'cancel_url' => 'http://127.0.0.1:8000/client/cancel',
        'metadata' => $quotation->order->user
      ]);

            return response($data);




      $response = Http::withHeaders([
       'private-key'  => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et',
       'public-key'   => 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy',
       'Content-Type' => 'application/application/json'
      ])->asJson()->post($waselAPI, $data);

//      return response($response);

      if ($response->status() === 200 || $response->status() == '200'){
        return redirect($nextUrl);
      }
      else{
        return 'error';
      }
    }

    public function cancel()
    {
      return 'cancel';
    }

    public function success()
    {

//      p.com/success?body=kfjjklfdjlkfjlkjdlkjflkj

//      $invoiceId = $response['invoice_referance'];
//      $nextUrl   = $response['next_url'];
//
//      Invoice::create([
//        'total'      => $quotation->total,
//        'invoice_id' => $invoiceId,
//        'order_id'   => $quotation->order->id,
//      ]);
//
//      Order::update(['status' => OrderEnum::PAID_ORDER]);
    }
}
