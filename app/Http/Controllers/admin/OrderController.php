<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index()
  {
    $orders=Order::select('id','user_id','pharmacy_id','address_id','status','created_at')->with(['user:id,name,avatar','pharmacy:id,name','pharmacy:id,name','address:id,desc'])->get();

    // return response($orders);
    return view('admin.orders', compact('orders'));

  }
}