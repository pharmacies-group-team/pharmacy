<?php

namespace App\Http\Controllers\client;

use App\Enum\OrderEnum;
use App\Events\NewOrderNotification;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\PharmacyOrderNotification;
use App\Services\NotificationAdminService;
use App\Services\NotificationService;
use App\Services\OrderServices;
use App\Traits\UploadsTrait;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Throwable;
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
  public function storeOrder(Request $request)
  {
    try {
      ##### validator #####
      Validator::validate($request->all(), Order::roles(), Order::messages());

      ##### upload image #####
      $image = $this->storeImage($request->image, OrderEnum::ORDER_IMAGE_PATH);

      $order = Order::create(
        [
          'user_id'     => Auth::id(),
          'pharmacy_id' => $request->input('pharmacy_id'),
          'image'       => $image,
          'order'       => $request->input('order'),
        ]
      );

      ##### send and save notification in DB #####
      NotificationService::newOrder($order);
    }
    catch (Throwable $e) {
      report($e);

      return redirect()->back()->with('success', 'تم إرسال طلبك بنجاح');
    }

    return redirect()->back()->with('success', 'تم إرسال طلبك بنجاح');
  }

  //********* Confirm the arrival of the request *********//
  public function confirmation(Request $request)
  {
    try {
      $order = Order::find($request->order_id);
      $order->update(['status' => OrderEnum::DELIVERED_ORDER]);

      $pharmacy = User::find($order->pharmacy_id);

      Transaction::where('order_id', $order->id)
        ->where('payable_id', $pharmacy->id)->update(['confirmed' => 1]);

      ##### send and save notification in DB #####
      NotificationAdminService::deliveredOrder($order);
      NotificationService::deliveredOrder($order);

      return redirect()->back()->with('status', 'تم تأكيد وصول الطلب بنجاح.');
    }
    catch (ConnectionException $e) {
      return redirect()->back()->with(['message' => 'لقد استغرقت العمليه اطول من الوقت المحدد لها يرجى إعادة المحاولة']);
    }
    catch (\Exception $th){
      return redirect()->back()->with(['message' => 'فشلت عملية التأكيد، تأكد من إتصال النت..']);
    }
  }

  //********* Cancel Order *********//
  public function cancelOrder($id)
  {
    return OrderServices::cancelOrder($id);
  }
}
