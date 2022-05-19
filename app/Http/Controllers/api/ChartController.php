<?php

namespace App\Http\Controllers\api;

use App\Enum\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
  public function pharmaciesChart(){
    $pharmacies = User::select(DB::raw('COUNT(*) as count'), DB::raw('Month(created_at) as month'))
      ->role(RoleEnum::PHARMACY)
      ->whereYear('created_at', date('Y'))
      ->groupBy(DB::raw('Month(created_at)'))
      ->pluck('count', 'month');

    foreach ($pharmacies->keys() as $month_number) {
      $labels[] = date('F', mktime(0, 0, 0, $month_number, 1));
    }

    $chart['labels'] = $labels;
    $chart['datasets'][1]['name']   = 'pharmacies';
    $chart['datasets'][1]['values'] = $pharmacies->values()->toArray();

    return response()->json($chart);
  }
}
