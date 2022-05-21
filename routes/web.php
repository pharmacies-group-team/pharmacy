<?php

use App\Enum\RoleEnum;

use App\Http\Controllers\Auth\LoginCustomController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Auth\RegisterPharmacyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// shared Controllers
use App\Http\Controllers\ChatController;

// standard Controllers
use App\Http\Controllers\web;
use App\Http\Controllers\admin;
use App\Http\Controllers\client;
use App\Http\Controllers\pharmacy;

/*
|--------------------------------------------------------------------------
| General Routes
|--------------------------------------------------------------------------
*/

Route::post('/login/custom', [LoginCustomController::class, 'login'])->name('login.custom');

Route::middleware(['auth', 'verified'])->name('setting.')->group(function () {
  Route::post('/update/avatar', [SettingController::class, 'updateAvatar'])->name('update.avatar');
});

Route::get('generate-invoice-pdf/{id}', [PDFController::class, 'generateInvoicePDF'])->name('generate.invoice-pdf');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::controller(web\HomeController::class)->group(function () {
  Route::get('/', 'index')->name('home');
  Route::get('/pharmacies', 'showPharmacies')->name('show.pharmacies');
  Route::get('/pharmacies/profile/{id}', 'showPharmacy')->name('show.pharmacy.profile');
  Route::get('/privacy', 'showPrivacy')->name('privacy');
  Route::get('/contact-us', 'showContactUs')->name('contact-us');
  Route::get('/about-us', 'showAboutUs')->name('about-us');
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
| Notifications Routes
|--------------------------------------------------------------------------
*/

// chat
Route::controller(ChatController::class)
  ->prefix('chat')
  // TODO enable auth
  // ->middleware(['auth'])
  ->name('chat.')
  ->group(function () {

    Route::get('/users',  'getUsers')->name('getUsers');
    Route::get('/messages/{id}', 'getUserMessages')->name('userMessages');

    Route::post('/messages/send',  'sendMessage')->name('sendMessage');
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

Route::prefix('/pharmacy')
  ->middleware(['auth', 'role:' . RoleEnum::PHARMACY, 'verified', 'active_account'])
  ->name('pharmacy.')->group(function () {

    Route::controller(pharmacy\DashboardController::class)->group(function () {
      // profile
      Route::get('/', 'index')->name('index');
      Route::get('/profile', 'profile')->name('profile');
      Route::get('/account-settings', 'accountSettings')
        ->name('account-settings');
      Route::get('/financial-operations', 'getFinancialOperations')->name('financial.operations');
      Route::get('/invoice/{id}', 'getInvoice')->name('invoice');
      Route::get('/chat', 'showChat')->name('chat');
      Route::post('/deactivate', 'deactivate')->name('deactivate');
    });

    Route::controller(pharmacy\OrderController::class)
      ->prefix('/orders')->name('orders.')->group(function () {
        Route::get('/', 'getAll')->name('index');
        Route::get('/refusal/{id}', 'orderRefusal')->name('refusal');
      });

    Route::controller(pharmacy\QuotationController::class)
      ->prefix('/quotation')->name('quotation.')->group(function () {

        Route::get('/', 'getAll')->name('index');
        Route::get('/details/{id}', 'getQuotationDetails')->name('details');
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

    Route::controller(admin\DashboardController::class)->group(function () {
      Route::get('/invoice/{id}', 'getInvoice')->name('invoice');
      Route::get('/financial-operations', 'getFinancialOperations')->name('financial.operations');
    });

    /*------------------------------ Users ------------------------------*/
    Route::controller(admin\UserController::class)->name('users.')->prefix('/users')->group(function () {
      Route::get('/', 'getAllUsers')->name('index');
      Route::get('/profile/{id}', 'userProfile')->name('profile');
      Route::get('/list', 'getUsers')->name('list');
    });

    Route::get('/', [admin\AdminController::class, 'index'])->name('index');
    Route::get('/account-settings', [admin\AdminController::class, 'showAccountSettings'])->name('account-settings');

    /*------------------------------ ads ------------------------------*/
    Route::resource('/ads', admin\AdController::class);

    /*------------------------------ payments ------------------------------*/
    Route::resource('/payments', admin\PaymentController::class);

    /*------------------------------ cities ------------------------------*/
    Route::resource('/cities', admin\CityController::class);

    /*------------------------------ directorates ------------------------------*/
    Route::resource('/directorates', admin\DirectorateController::class);

    /*------------------------------ Neighborhood ------------------------------*/
    Route::resource('/neighborhoods', admin\NeighborhoodController::class);

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

    /*------------------------------ orders ------------------------------*/
    // Route::get('/orders', [admin\OrderController::class, 'index'])
    //   ->name('admin.orders'); // TODO

  });



/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/client')
  ->name('client.')
  ->middleware(['auth', 'role:' . RoleEnum::CLIENT, 'verified', 'active_account'])
  ->group(function () {

    // dashboard
    Route::controller(client\DashboardController::class)->group(function () {
      Route::get('/', 'index')->name('index');
      Route::get('/account-settings', 'accountSettings')->name('account-settings');
      Route::get('/address', 'address')->name('address');
      Route::get('/financial-operations', 'getFinancialOperations')->name('financial.operations');
      Route::post('/deactivate', 'deactivate')->name('deactivate');

      Route::get('/periodic-orders',  [client\PerodicOrderController::class, 'showTasks'])->name('showTasks');
      Route::post('/addPerodicOrder',  [client\PerodicOrderController::class, 'addTask'])->name('addPerodicOrder');
      Route::post('/togglePerodicOrder/{id}',  [client\PerodicOrderController::class, 'togglePerodicOrder'])->name('togglePerodicOrder');
      Route::get('/financial-operations', 'getFinancialOperations')->name('financial.operations');


      // chat
      Route::get('/chat', 'showChat')->name('chat');
    });

    // order
    Route::controller(client\OrderController::class)
      ->prefix('/orders')
      ->name('orders.')->group(function () {
        Route::get('/', 'getAll')->name('index');
        Route::post('/', 'storeOrder')->name('store');
        Route::get('/{id}', 'showOrder')->name('show');
        Route::post('/confirmation', 'confirmation')->name('confirmation');
        Route::get('/cancel/{id}', 'cancelOrder')->name('cancel');
      });

    // quotation
    Route::get('/quotation/details/{id}', [client\QuotationController::class, 'getQuotationDetails'])->name('quotation.details');

    // payment
    Route::controller(client\PaymentController::class)->group(function () {
      Route::get('/success/{data}',  'success')->name('success');
      Route::get('/cancel', 'cancel')->name('cancel');
      Route::get('/invoice/{id}', 'getInvoice')->name('invoice');
    });
  });


Auth::routes(['verify' => true]);

// only for document dev components
Route::get('/dev', function () {
  return view('web.dev-docs.index');
});