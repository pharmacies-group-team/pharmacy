<?php

namespace App\Http\Controllers\client;


use App\Enum\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;

use App\Models\User;
use App\Notifications\PharmacyOrderNotification;
use App\Traits\UploadsTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
//	id	order	image	status	periodic	re_order_date	user_id	pharmacy_id	deleted_at	created_at	updated_at	
class OrderController extends Controller
{
  
    use UploadsTrait;
  
   public function index()
  {
    $user_id = Auth::user()->id;

    $orders=Order::select('id','periodic','re_order_date','status','pharmacy_id','user_id','created_at')->where('user_id', $user_id)->with(['orderDetails'])->get();

    return response($orders);
  }

    public function getAll()
    {
      $orders = Auth::user()->userOrders()->get();
      return response($orders);
    }

    public function showOrder($id)
    {
      $order = Order::where('user_id', Auth::id())->where('id', $id)->first();
      return response($order);
    }

    public function storeOrder(Request $request): RedirectResponse
    {
        // validator
        Validator::validate($request->all(), Order::roles(), Order::messages());

        // upload image
        $image = $this->storeImage($request->image,OrderEnum::ORDER_IMAGE_PATH);

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

        Notification::send($pharmacy, new PharmacyOrderNotification($data));

        Notification::send($client, new UserOrderNotification($data));

        return redirect()->back()->with('success', 'تم إرسال طلبك بنجاح');
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
