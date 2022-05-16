<?php

namespace App\Http\Controllers\client;

use App\Enum\OrderEnum;
use App\Events\NewOrderNotification;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\PharmacyOrderNotification;
use App\Services\NotificationAdminService;
use App\Services\NotificationService;
use App\Services\OrderServices;
use App\Traits\UploadsTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnArgument;

class OrderController extends Controller
{
  //********* git all order for client *********//
  public function getAll()
  {
    $orders = Auth::user()->userOrders()->orderBy('created_at', 'DESC')->get();

    return view('client.orders', compact('orders'));
  }

  //********* create new order by client *********//
  public function storeOrder(Request $request): RedirectResponse
  {
    // validator
    Validator::validate($request->all(), Order::roles(), Order::messages());

    // upload image
    $image = $this->storeImage($request->image, OrderEnum::ORDER_IMAGE_PATH);

    $order = Order::create(
      [
        'user_id'     => Auth::id(),
        'pharmacy_id' => $request->input('pharmacy_id'),
        'image'       => $image,
        'order'       => $request->input('order'),
      ]
    );

    // send and save notification in DB
    NotificationService::newOrder($order);

    return redirect()->back()->with('success', 'تم إرسال طلبك بنجاح');
  }

  //********* Confirm the arrival of the request *********//
  public function confirmation(Request $request)
  {
    $order = Order::find($request->order_id);
    $order->update(['status' => OrderEnum::DELIVERED_ORDER]);

    // send and save notification in DB
    NotificationAdminService::deliveredOrder($order);
    NotificationService::deliveredOrder($order);

    return redirect()->back()->with('status', 'تم تأكيد وصول الطلب بنجاح.');
  }

  public function cancelOrder($id)
  {
    return OrderServices::cancelOrder($id);
  }
}
