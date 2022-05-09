<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
  public function createQuotation($id)
  {
    $order = Order::find($id);
    return view('pharmacy.orders.create-quotation', compact('order'));
  }

  public function getAll()
  {
    $quotation = Order::with('quotation')->where('pharmacy_id', Auth::id())->get();
    return response($quotation);
  }

  public function getQuotationDetails($id)
  {
    $quotationDetails = QuotationDetails::where('quotation_id', $id)->get();
    $quotation        = Quotation::find($id);

    return view('pharmacy.testing-details-quotation', compact('quotationDetails', 'quotation'));
  }
}
