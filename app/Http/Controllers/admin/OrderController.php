<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index()
  {
    $orders = Order::select()->with('orderDetails', 'client', 'pharmacy')->get();

    return response($orders);
  }
}