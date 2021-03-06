<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\User;

use App\Services\FinancialOperationsServices;
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

  public function accountSettings()
  {
    $user = Auth::user();
    return view('pharmacy.account-settings', compact('user'));
  }

  //********* get all financial operations *********//
  public function getFinancialOperations()
  {
    return FinancialOperationsServices::getFinancialOperations('pharmacy');
  }

  //********* Show Invoice *********//
  public function getInvoice($invoiceID)
  {
    return FinancialOperationsServices::getInvoice($invoiceID, 'pharmacy');
  }

  // chat page
  public function showChat()
  {
    return view('pharmacy.chat');
  }

  // dactive user
  public function deactivate()
  {
    $id = Auth::id();
    // dd($id);
    $User = User::where('id', $id)->update(['is_active' => !User::find($id)->is_active]);
    Auth::logout();
    return view('message.user-not-active');
  }
}