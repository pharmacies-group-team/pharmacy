<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index()
  {
    $orders = Order::select()->with('address', 'user', 'pharmacy')->get();
    // return response($orders);
    return view('admin.orders', compact('orders'));

  }
}