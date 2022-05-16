<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function invoiceProcess($id)
    {
      $transaction = Transaction::where('payable_id', $id)->get();
      return response($transaction);
    }
}
