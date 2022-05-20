<?php

use App\Http\Controllers\api\ChartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(ChartController::class)
  ->name('report')
  ->group(function () {
    Route::get('/report/pharmacies', 'pharmaciesChart')->name('pharmacies');
    Route::get('/report/clients', 'clientsChart')->name('clients');
    Route::get('/report/orders', 'ordersChart')->name('orders');
  });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
