<?php

namespace App\Http\Controllers\client;

use App\Enum\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Traits\UploadsTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use UploadsTrait;

    public function order(Request $request): RedirectResponse
    {
        // validator
        Validator::validate($request->all(), OrderDetails::roles(), OrderDetails::messages());

        // upload image
        $image = $this->storeImage($request->input('image'),OrderEnum::ORDER_IMAGE_PATH);

        $order = Order::create(
        [
          'client_id'   => $request->input('client_id'),
          'pharmacy_id' => $request->input('pharmacy_id')
        ]);

        OrderDetails::create(
        [
          'image'    => $image,
          'order'    => $request->input('order'),
          'order_id' => $order->id
        ]);

        return redirect()->back()->with('success', 'تم بنجاح');
    }
}
