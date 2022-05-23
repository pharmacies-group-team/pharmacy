<?php

namespace App\Http\Controllers\api;

use App\Enum\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
  //********* Report on the number of pharmacies registered on the site each month  *********//
  public function pharmaciesChart()
  {
    $pharmacies = User::select(DB::raw('COUNT(*) as count'), DB::raw('Month(created_at) as month'))
      ->role(RoleEnum::PHARMACY)
      ->whereYear('created_at', date('Y'))
      ->groupBy(DB::raw('Month(created_at)'))
      ->pluck('count', 'month');

    return response()->json($this->generateJson($pharmacies, 'pharmacies'));
  }

  //********* Report on the number of clients registered on the site each month  *********//
  public function clientsChart()
  {
    $clients = User::select(DB::raw('COUNT(*) as count'), DB::raw('Month(created_at) as month'))
      ->role(RoleEnum::CLIENT)
      ->whereYear('created_at', date('Y'))
      ->groupBy(DB::raw('Month(created_at)'))
      ->pluck('count', 'month');

    return response()->json($this->generateJson($clients, 'client'));
  }

  //********* Report on the number of orders each month  *********//
  public function ordersChart()
  {
    $orders = Order::select(DB::raw('COUNT(*) as count'), DB::raw('Month(created_at) as month'))
      ->whereYear('created_at', date('Y'))
      ->groupBy(DB::raw('Month(created_at)'))
      ->pluck('count', 'month');

    return response()->json($this->generateJson($orders, 'orders'));
  }

  //********* Report on the number of requests to the pharmacy each month  *********//
  public function ordersPharmacyChart($id)
  {
    $orders = Order::select(DB::raw('COUNT(*) as count'), DB::raw('Month(created_at) as month'))
      ->whereYear('created_at', date('Y'))
      ->where('pharmacy_id', $id)
      ->groupBy(DB::raw('Month(created_at)'))
      ->pluck('count', 'month');

    return response()->json($this->generateJson($orders, 'orders'));
  }

  private function generateJson($result, $nameDS)
  {
    $i = 0;
    $labels = $this->generateMonth($result);

    foreach ($result as $key => $value) {
      $new[] = [$labels[$i] => $value];
      $i++;
    }
    return $new;
  }

  private function generateMonth($result)
  {
    foreach ($result->keys() as $month_number) {
      $labels[] = date('F', mktime(0, 0, 0, $month_number, 1));
    }

    return $labels;
  }
}
