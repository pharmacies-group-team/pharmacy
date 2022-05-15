<?php

namespace App\Services;

use App\Enum\OrderEnum;
use App\Models\Order;

class OrderServices
{

  //********* Cancel Order *********//
  public static function cancelOrder($id)
    {
      Order::find($id)->update(['status' => OrderEnum::CANCELED_ORDER]);

      return redirect()->route('client.orders.index')
        ->with('status', 'لقد قمت بإلغاء طلبك');
    }

}
