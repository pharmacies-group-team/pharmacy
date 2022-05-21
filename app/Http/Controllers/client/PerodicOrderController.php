<?php

namespace App\Http\Controllers\client;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

use App\Models\PerodicOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PerodicOrderController extends Controller
{
  // show all perodic task
  public function showTasks()
  {

    $perodic_orders = Auth::user()->userPerodicOrders()->get();
    return view('client.perodic-orders', compact('perodic_orders'));
  }


  // add new perodic task
  public function addTask(Request $request)
  {

    // validator
    Validator::validate($request->all(), PerodicOrder::roles(), PerodicOrder::messages());

    $data = $request->all();
    $perodic_order = new PerodicOrder();
    $perodic_order->user_id = Auth::id();
    $perodic_order->order_id = $data['order_id'];
    $perodic_order->start_date = $data['start_date'];
    $perodic_order->perodic_date_type = $data['perodic_date_type'];
    // if ($data['perodic_date_type'] === PerodicOrderEnum::WEEKLY) {
    //   $nextDate = Carbon::parse($data['start_date'])->copy()->addWeek();
    // } else if ($data['perodic_date_type'] === PerodicOrderEnum::MONTHLY) {
    //   $nextDate = Carbon::parse($data['start_date'])->copy()->addMonth();
    // }
    $perodic_order->next_order_date = $data['start_date'];
    $perodic_order->is_active = 1;
    // $perodic_order->save();
    if ($perodic_order->save()) {
      $result = true;
    } else {
      $result = false;
    }
    return back()->with('status', $result ? 'تم اضافه الطلب الدوري بنجاح' : 'failed');
  }


  // activate and deactivate perodic orders
  public function togglePerodicOrder(Request $request, $id)
  {
    $perodic_order = PerodicOrder::where('id', $id)->update(['is_active' => !PerodicOrder::find($id)->is_active]);

    return redirect()->back()->with('status', $perodic_order ? 'تمت العملية بنجاح.' : 'failed');
  }
}

// $order->update(['status' => OrderEnum::DELIVERED_ORDER]);