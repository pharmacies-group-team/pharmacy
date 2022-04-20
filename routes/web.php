<?php

use App\Http\Controllers\advertisement\advertisementController;
use App\Http\Controllers\advertisement\AdvertisementController as AdvertisementAdvertisementController;
use App\Http\Controllers\pharmacy\PharmacyController;
use Illuminate\Support\Facades\Route;

use Barryvdh\Debugbar\Facades\Debugbar;
// TODO
// disable Debug
Debugbar::disable();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});


// pharmacies
Route::get('/pharmacies', [PharmacyController::class, 'index']);
Route::get('/pharmacies/{id}', [PharmacyController::class, 'show']);
Route::post('/pharmacies', [PharmacyController::class, 'store']);
Route::put('/pharmacies/{id}', [PharmacyController::class, 'update']);
Route::delete('/pharmacies/{id}', [PharmacyController::class, 'destroy']);
Route::get('/pharmacies', [PharmacyController::class, 'index']);

Route::get('/advertisement', [AdvertisementController::class, 'index']);
Route::get('/advertisement/{id}', [AdvertisementController::class, 'show']);
Route::post('/advertisement', [AdvertisementController::class, 'store']);
Route::put('/advertisement/{id}', [AdvertisementController::class, 'update']);
Route::delete('/advertisement/{id}', [AdvertisementController::class, 'destroy']);
Route::get('/advertisement', [AdvertisementController::class, 'index']);
