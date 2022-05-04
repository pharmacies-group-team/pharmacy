<?php

namespace App\Http\Controllers\pharmacy;

use App\Enum\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getAll()
    {
        $orders = Auth::user()->pharmacyOrders()->get();
        return response($orders);
    }

    public function orderRefusal($id)
    {
        $order = Order::find($id);

        if ($order)
        {
            $order->update(['status' => OrderEnum::REFUSAL_ORDER]);
            return back()->with('status', 'لقد تم رفض الطلب');
        }

        return back()->with('status', 'هُناك خطأ، يُرجى التأكد من صحة رقم الطلب');
    }
}
