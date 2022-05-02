<?php

namespace App\Http\Controllers\pharmacy;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   // show orders

  public function index()
  {

  $pharmacy_id = Auth::user()->id;
  $orders=Order::select('user_id','pharmacy_id','status','created_at')->where('pharmacy_id', $pharmacy_id)->with(['user:id,name,avatar'])->get();

   return view('pharmacy.dashboard.orders', compact('orders'));
  // return response( $request);


   }

}