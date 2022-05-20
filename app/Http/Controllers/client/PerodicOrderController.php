<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller\OrderController;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;

use App\Models\PerodicOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Order;

use App\Enum\PerodicOrderEnum;


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
    $perodic_order->save();
    return back()->with('status', 'تم اضافه الطلب الدوري بنجاح');
  }



  // activate and deactivate perodic orders
  public function togglePerodicOrder(Request $request, $id)
  {
    $perodic_order = PerodicOrder::where('id', $id)->update(['is_active' => !PerodicOrder::find($id)->is_active]);

    return redirect()->back()->with('status', $perodic_order ? 'تمت العملية بنجاح.' : 'failed');
  }
}