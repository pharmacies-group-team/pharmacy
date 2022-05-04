<?php

namespace App\Http\Controllers\client;

use App\Enum\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;

use App\Models\User;
use App\Notifications\UserOrderNotification;
use App\Traits\UploadsTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use UploadsTrait;

    public function order(Request $request): RedirectResponse
    {
      dd($request->input('image'));
        // validator
        Validator::validate($request->all(), Order::roles(), Order::messages());

        // upload image
        $image = $this->storeImage($request->input('image'),OrderEnum::ORDER_IMAGE_PATH);

        $order = Order::create(
        [
          'user_id'     => Auth::id(),
          'pharmacy_id' => $request->input('pharmacy_id'),
          'image'       => $image,
          'order'       => $request->input('order'),
        ]);

       $client = User::find($request->input('pharmacy_id'));
        $data     = ['client' => Auth::user(), 'order' => $order];

        // send and save notification in DB
        Notification::send($client, new UserOrderNotification($data));

        return redirect()->back()->with('success', 'تم بنجاح');
    }
  public function show($id)
  {
   $client = Order::with(['user', 'pharmacy', 'addresse'])->where('id', $id)->get();

    return response($client);
  }
    //Data to display:

// user name.

// user avatar

// date of order (created_at)

// pharmacy name

// pharmacy id

// address (delivery location for user)

// order

// image

// status order
}
