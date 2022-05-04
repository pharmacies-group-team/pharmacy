<?php

namespace App\Http\Controllers\pharmacy;

use App\Enum\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getAll()
    {
        // TODO Bug
        // $orders = Auth::user()->pharmacyOrders()->get();
        $orders = [
            (object) [
                'id' => 1,
                'status' => 1,
                'client' => 'ali',
                'date' => '2002/2/10',
            ],
            (object) [
                'id' => 2,
                'status' => 1,
                'client' => 'Ahmed',
                'date' => '2002/2/10',
            ]
        ];

        // echo $orders[0]->id;
        // exit;

        return view('pharmacy.dashboard.orders', compact('orders'));
    }

    public function orderRefusal($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->update(['status' => OrderEnum::REFUSAL_ORDER]);
            return back()->with('status', 'لقد تم رفض الطلب');
        }

        return back()->with('status', 'هُناك خطأ، يُرجى التأكد من صحة رقم الطلب');
    }
}
