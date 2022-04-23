<?php

use App\Enum\RoleEnum;
use App\Http\Controllers\admin;
use App\Http\Controllers\Auth\RegisterPharmacyController;
use App\Http\Controllers\pharmacy;
use App\Http\Controllers\web;
use Illuminate\Support\Facades\Auth;
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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::controller(web\HomeController::class)->group(function (){

  Route::get('/', 'index')->name('home');
  Route::get('/pharmacies', 'showPharmacies')->name('pharmacies');
  Route::get('/pharmacies/{id}', 'showPharmacy')->name('pharmacy');

});

/*
|--------------------------------------------------------------------------
| Register Pharmacy Routes
|--------------------------------------------------------------------------
*/
Route::controller(RegisterPharmacyController::class)->group(function (){

  Route::get('/register/pharmacy', 'index')->name('register.pharmacy');
  Route::post('/register/pharmacy', 'store')->name('register.pharmacy.store');

});

/*
|--------------------------------------------------------------------------
| Pharmacies Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/dashboard/pharmacies')->middleware(['auth', 'role:'.RoleEnum::PHARMACY])
  ->name('pharmacies.')->group(function (){

    Route::resource('/', pharmacy\PharmacyController::class);

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/admin')->middleware(['auth', 'role:'.RoleEnum::SUPER_ADMIN])
  ->name('admin.')->group(function () {

  /* ads */
  Route::resource('/ads', admin\AdController::class);

  /* website content */
  Route::prefix('site')->controller(admin\SiteController::class)->group(function () {

      Route::get('/', 'index')->name('site');
      Route::put('/about-us', 'updateAboutUs')->name('updateAboutUs'); // admin.updateAboutUs

      Route::post('/services', 'addService')->name('addService');
      Route::put('/services/{service}', 'updateService')->name('updateService');

      Route::put('/contact-us', 'updateContactUs')->name('updateContactUs');

      Route::put('/social', 'updateSocial')->name('updateSocial');

  });

  // clients
  Route::get('/clients', [admin\ClientController::class, 'index'])->name('clients');

  // orders
  Route::get('/orders', [admin\OrderController::class, 'index']);

  // pharmacies
  Route::get('pharmacies', [admin\PharmacyController::class, 'index'])->name('pharmacies');

});

Auth::routes();
