<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

  public function index()
  {
    return view('admin.index');
  }

  public function showAccountSettings()
  {
    $user = Auth::user();

    return view('admin.account-settings', compact('user'));
  }
}
