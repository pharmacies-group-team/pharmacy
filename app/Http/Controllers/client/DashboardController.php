<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FinancialOperationsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
  public function index()
  {
    return view('client.index');
  }


  public function accountSettings()
  {
    $user = Auth::user();
    return view('client.account-setting', compact('user'));
  }

  public function address()
  {
    return view('client.address');
  }

  //********* get all financial operations *********//
  public function getFinancialOperations()
  {
    return FinancialOperationsServices::getFinancialOperations('client');
  }

  // chat page
  public function showChat()
  {
    return view('client.chat');
  }

  public function deactivate()
  {
    $id = Auth::id();
    $User = User::where('id', $id)->update(['is_active' => !User::find($id)->is_active]);
    Auth::logout();
    return view('message.user-not-active');
  }
}