<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  public function getAll()
  {
    try {
      $notifications = auth()->user()->notifications;
      return view('shared.notifications', compact('notifications'));
    } catch (\Throwable $th) {
      return redirect()->back();
    }
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
