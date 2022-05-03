<?php

namespace App\Http\Controllers\client;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;

class OrderController extends Controller
{
  public function index()
  {
    $user_id = Auth::user()->id;

    $orders=Order::select('id','periodic','re_order_date','status','pharmacy_id','user_id','created_at')->where('user_id', $user_id)->with(['orderDetails'])->get();

    return response($orders);
  }
}
