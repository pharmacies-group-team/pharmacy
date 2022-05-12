<?php

namespace App\Http\Controllers\pharmacy;

use App\Enum\OrderEnum;
use App\Events\NewOrderNotification;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Notifications\UserOrderNotification;
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


          $pharmacy = Auth::user()->pharmacy;
          $user     = User::find($order->user_id);

          $data     = [
            'sender'   => $pharmacy,
            'receiver' => $user->id,
            'link'     => 'client.orders.index',
            'message'  => 'عذراً لا يتوفر لدينا طلبك..',
          ];

          // send and save notification in DB
          Notification::send($user, new NewOrderNotification($data));

          return back()->with('status', 'لقد تم رفض الطلب');

        }

        return back()->with('status', 'هُناك خطأ، يُرجى التأكد من صحة رقم الطلب');
    }
}
