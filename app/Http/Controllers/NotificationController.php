<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAll()
    {
      $notifications = auth()->user()->notifications;

      return view('0-testing.all-notification', compact('notifications'));
    }

    public function read(Request $request)
    {
      $notification = auth()->user()->unreadNotifications
        ->where('id', $request->input('id'))->first();

      $notification->markAsRead();

      $order = Order::find($notification->data['order_id']);

      return response($order);
    }
}
