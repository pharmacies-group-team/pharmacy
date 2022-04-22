<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\pharmacy\PharmacyController;
use App\Http\Controllers\web\HomeController;
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

// home page
Route::get('/', [HomeController::class, 'index']);

// pharmacies
Route::resource('/pharmacies', PharmacyController::class);

Route::prefix('admin')->group(function () {

  // TODO
  // Route::middleware(['auth'])->group(function () {

  /* ads */
  Route::resource('/ads', admin\AdController::class);

  /* website content */
  Route::prefix('site')->group(function () {
    Route::get('/', [admin\SiteController::class, 'index']);
    Route::put('/about-us', [admin\SiteController::class, 'updateAboutUs']);

    Route::post('/services', [admin\SiteController::class, 'addService']);
    Route::put('/services/{service}', [admin\SiteController::class, 'updateService']);

    Route::put('/contact-us', [admin\SiteController::class, 'updateContactUs']);

    Route::put('/social', [admin\SiteController::class, 'updateSocial']);
  });
  // });
});


//
