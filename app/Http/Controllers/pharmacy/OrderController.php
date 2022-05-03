<?php

namespace App\Http\Controllers\pharmacy;

use App\Enum\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getAll()
    {
        $orders = Auth::user()->pharmacyOrders()->get();
        return response($orders);
    }
}
