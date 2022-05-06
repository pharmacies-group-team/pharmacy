<?php

use App\Enum\RoleEnum;

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\web;
use App\Http\Controllers\admin;
use App\Http\Controllers\client;
use App\Http\Controllers\pharmacy;
use App\Http\Controllers\Auth\RegisterPharmacyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Barryvdh\Debugbar\Facades\Debugbar;

// TODO
// disable Debug
// Debugbar::disable();
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

Route::controller(web\HomeController::class)->group(function () {
  Route::get('/', 'index')->name('home');
  Route::get('/pharmacies', 'showPharmacies')->name('show.pharmacies');
  Route::get('/pharmacies/profile/{id}', 'showPharmacy')->name('show.pharmacy.profile');
});

/*
|--------------------------------------------------------------------------
| General Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])
  ->name('setting.')
  ->group(function () {
    //  Route::post('/change/password', [ChangePasswordController::class, 'updatePassword'])->name('update.password');

    Route::post('/update/avatar', [SettingController::class, 'updateAvatar'])
      ->name('update.avatar');
  });

/*
|--------------------------------------------------------------------------
| Notifications Routes
|--------------------------------------------------------------------------
*/

Route::controller(NotificationController::class)->group(function () {
  Route::get('/notification', 'getAll')->name('notification');
  Route::post('/read/notification', 'read')->name('notification.read');
});

/*
|--------------------------------------------------------------------------
| Register Pharmacy Routes
|--------------------------------------------------------------------------
*/
Route::controller(RegisterPharmacyController::class)->group(function () {
  Route::get('/register/pharmacy', 'index')->name('register.pharmacy');
  Route::post('/register/pharmacy', 'store')->name('register.pharmacy.store');
});

/*
|--------------------------------------------------------------------------
| Pharmacies Routes
|--------------------------------------------------------------------------
*/

// TODO only for debugging
Route::prefix('/pharmacy')
  ->middleware(['auth', 'role:' . RoleEnum::PHARMACY, 'verified'])
  ->name('pharmacy.')->group(function () {
    // Route::resource('/', pharmacy\PharmacyController::class);
    // Route::view('/', 'pharmacy.dashboard.setting')->name('dashboard');

    Route::controller(pharmacy\DashboardController::class)->group(function () {
      // profile
      Route::get('/', 'index')->name('index');
      Route::get('/profile', 'profile')->name('profile');
      Route::get('/messages', 'messages')->name('messages');
      Route::get('/account-settings', 'accountSettings')->name('account-settings');
    });

    Route::controller(pharmacy\OrderController::class)
      ->prefix('/orders')->name('orders.')->group(function () {
        Route::get('/', 'getAll')->name('index');
        Route::get('/{id}', 'getOrder')->name('single');
        Route::get('/refusal/{id}', 'orderRefusal')->name('refusal');
      });

    Route::controller(pharmacy\QuotationController::class)
      ->prefix('/quotation')->name('quotation.')->group(function () {

        Route::get('/', 'getAll')->name('index');
        Route::get('/{id}', 'createQuotation')->name('create');
      });

    Route::post('/update/logo', [pharmacy\ProfileController::class, 'updateLogo'])
      ->name('update.logo');
  });
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/admin')
  ->name('admin.')
  ->middleware(['auth', 'role:' . RoleEnum::SUPER_ADMIN])
  ->group(function () {

    Route::get('/', [admin\AdminController::class, 'index'])->name('index');

    // admin profile
    Route::get('profile', [admin\AdminProfileController::class, 'index'])
      ->name('profile'); //X

    Route::put('profile', [admin\AdminProfileController::class, 'updateProfile'])
      ->name('update-profile'); //X
    /*------------------------------ ads ------------------------------*/
    Route::resource('/ads', admin\AdController::class);

    /*------------------------------ payments ------------------------------*/
    Route::resource('/payments', admin\PaymentController::class);

    /*------------------------------ website content ------------------------------*/
    Route::prefix('site')->controller(admin\SiteController::class)
      ->group(function () {
        Route::get('/', 'index')->name('site');
        Route::put('/about-us', 'updateAboutUs')
          ->name('updateAboutUs');

        Route::post('/services', 'addService')->name('addService');
        Route::put('/services/{service}', 'updateService')->name('updateService');
        Route::delete('/services/{service}', 'deleteService')->name('deleteService');

        Route::put('/contact-us', 'updateContactUs')->name('updateContactUs');

        Route::put('/social', 'updateSocial')->name('updateSocial');
      });

    /*------------------------------ clients ------------------------------*/
    Route::controller(admin\ClientController::class)->group(function () {
      Route::get('/clients', 'index')
        ->name('clients');

      Route::post('/clients/toggle/{id}',  'clientToggle')
        ->name('clients.toggle');
    });

    /*------------------------------ orders ------------------------------*/
    // Route::get('/orders', [admin\OrderController::class, 'index'])
    //   ->name('admin.orders'); // TODO

    // pharmacies
    Route::controller(admin\PharmacyController::class)->group(function () {
      Route::get('/pharmacies',  'index')
        ->name('pharmacies');

      Route::post('/pharmacies/toggle/{id}',  'pharmacyToggle')
        ->name('pharmacies.toggle');
    });

    Route::view('/account-settings', 'admin.account-settings')
      ->name('account-settings');
  });

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/
// TODO only for debugging
Route::prefix('/client')
  ->name('client.')
  ->middleware(['auth', 'role:' . RoleEnum::CLIENT, 'verified'])
  ->group(function () {

    // dashboard
    Route::controller(client\DashboardController::class)->group(function () {
      Route::get('/', 'index')->name('index');
      Route::get('/profile', 'getProfile')->name('profile');
    });

    Route::controller(client\OrderController::class)
      ->prefix('/orders')
      ->name('orders.')->group(function () {
        Route::get('/', 'getAll')->name('index');
        Route::post('/', 'storeOrder')->name('store');
        Route::get('/{id}', 'showOrder')->name('show');
      });
  });

Auth::routes(['verify' => true]);
