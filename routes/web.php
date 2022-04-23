<?php

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


Route::get('/admins', function () {
    return view('admin.admins-users');
});

Route::get('/pharmacies', function () {
    return view('admin.pharmacies-users');
});

Route::get('/clients', function () {
    return view('admin.clients');
});

Route::get('/ads', function () {
    return view('admin.ads');
});

Route::get('/add-pharmacy', function () {
    return view('pharmacy.pharmacies');
});

Route::get('/manage-pages', function () {
    return view('admin.manage-pages');
});