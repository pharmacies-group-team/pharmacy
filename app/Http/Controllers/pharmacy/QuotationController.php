<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
    public function createQuotation($id)
    {
        $order = Order::find($id);
        return view('0-testing.create-quotation', compact('order'));
    }

    public function getAll()
    {
      $quotation = Order::with('quotation')->where('pharmacy_id', Auth::id())->get();
      return response($quotation);
    }
}
