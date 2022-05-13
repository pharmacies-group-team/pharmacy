<?php

namespace App\Http\Controllers\pharmacy;

use App\Enum\OrderEnum;
use App\Events\NewOrderNotification;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Notifications\UserOrderNotification;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function getAll()
    {
        $orders = Auth::user()->pharmacyOrders()->orderBy('created_at', 'DESC')->get();
        return view('pharmacy.orders', compact('orders'));
    }

    public function orderRefusal($id)
    {
        $order = Order::find($id);

        if ($order) {
          $order->update(['status' => OrderEnum::REFUSAL_ORDER]);

          // send and save notification in DB
          NotificationService::refusalOrder($order);

          return back()->with('status', 'لقد تم رفض الطلب');
        }

        return back()->with('status', 'هُناك خطأ، يُرجى التأكد من صحة رقم الطلب');
    }
}
