<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pharmacy.index');
    }

    public function profile()
    {
        $pharmacy = Auth::user()->pharmacy()->first();

        return view('pharmacy.profile', compact('pharmacy'));
    }

    public function messages()
    {
        return view('pharmacy.messages');
    }

    public function accountSettings()
    {
        $user = Auth::user();
        return view('pharmacy.account-settings', compact('user'));
    }

    public function getInvoiceProfile()
      {
          $user                  = Auth::user();
          $transactions          = Transaction::where('payable_id', $user->id)->get();
          $amount_confirmed      = Transaction::where('payable_id', $user->id)->where('confirmed', 1)->sum('amount');
          $amount_not_confirmed  = Transaction::where('payable_id', $user->id)->where('confirmed', 0)->sum('amount');
          $invoice_confirmed     = Transaction::where('payable_id', $user->id)->where('confirmed', 1)->count('amount');
          $invoice_not_confirmed = Transaction::where('payable_id', $user->id)->where('confirmed', 0)->count('amount');

          return view('pharmacy.invoice-profile',
            compact('user', 'transactions', 'amount_confirmed','amount_not_confirmed', 'invoice_confirmed', 'invoice_not_confirmed'));
      }
}
