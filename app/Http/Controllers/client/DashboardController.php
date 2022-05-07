<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

//    public function getProfile()
//    {
//        return view('client.profile');
//    }

    public function accountSettings()
    {
      $user = Auth::user();
      return view('client.account-setting', compact('user'));
    }

    public function address()
    {
      return view('client.address');
    }
}
