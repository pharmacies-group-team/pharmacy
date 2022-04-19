<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// change-password 
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');

Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');