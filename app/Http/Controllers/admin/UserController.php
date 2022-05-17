<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
      return view('admin.users');
    }

  public function userProfile($id)
  {
    $user                  = User::find($id);
    $transactions          = Transaction::where('payable_id', $user->id)->get();
    $amount_confirmed      = Transaction::where('payable_id', $user->id)->where('confirmed', 1)->sum('amount');
    $amount_not_confirmed  = Transaction::where('payable_id', $user->id)->where('confirmed', 0)->sum('amount');
    $invoice_confirmed     = Transaction::where('payable_id', $user->id)->where('confirmed', 1)->count('amount');
    $invoice_not_confirmed = Transaction::where('payable_id', $user->id)->where('confirmed', 0)->count('amount');

    return view('admin.user-profile',
      compact('user', 'transactions', 'amount_confirmed','amount_not_confirmed', 'invoice_confirmed', 'invoice_not_confirmed'));
  }
}
