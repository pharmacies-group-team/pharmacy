<?php

namespace App\Services;

use App\Enum\OrderEnum;
use App\Models\Order;

class OrderServices
{

  //********* Cancel Order *********//
  public static function cancelOrder($id)
    {
      $order = Order::find($id);
      $order->update(['status' => OrderEnum::CANCELED_ORDER]);

      // send and save notification in DB
      NotificationService::cancelOrder($order);

      return redirect()->route('client.orders.index')
        ->with('status', 'لقد قمت بإلغاء طلبك');
    }

}
