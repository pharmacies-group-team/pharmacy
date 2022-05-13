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
use App\Services\NotificationService;
use App\Traits\UploadsTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnArgument;

class OrderController extends Controller
{
  public function getAll()
  {
    $orders = Auth::user()->userOrders()->orderBy('created_at', 'DESC')->get();

    return view('client.orders', compact('orders'));
  }


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

    NotificationService::newOrder($request->input('pharmacy_id'));

    return redirect()->back()->with('success', 'تم إرسال طلبك بنجاح');
  }
}
