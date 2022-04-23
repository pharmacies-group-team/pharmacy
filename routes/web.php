<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\client\ClientProfileController;
use App\Http\Controllers\pharmacy;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\web;
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
Route::get('/', [web\HomeController::class, 'index'])->name('web.home');

// pharmacies
Route::resource('/pharmacies', pharmacy\PharmacyController::class);

Route::prefix('admin')->group(function () {

  // TODO
  // Route::middleware(['auth'])->group(function () {

  // admin profile
  Route::get(
    'profile',
    [AdminProfileController::class, 'index']
  )->name('admin.profile');

  // admin profile
  Route::post(
    'profile',
    [AdminProfileController::class, 'updateProfile']
  )->name('admin.update-profile');

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

  // clients
  Route::get(
    '/clients',
    [admin\ClientController::class, 'index']
  )->name('admin.clients');

  // orders
  Route::get(
    '/orders',
    [admin\OrderController::class, 'index']
  )->name('admin.orders');

  // pharmacies
  Route::get(
    '/pharmacies',
    [admin\PharmacyController::class, 'index']
  )->name('admin.pharmacies');
  // });
});

// client
Route::prefix('clients')->group(function () {
  Route::get(
    '/profile',
    [ClientProfileController::class, 'index']
  )->name('clients.profile');
  Route::post(
    '/profile',
    [ClientProfileController::class, 'updateProfile']
  )->name('clients.update-profile');
});
