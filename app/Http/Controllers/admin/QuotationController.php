<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
  // public function getQuotationDetails($id)
  // {
  //   $quotationID = $id;
  //   return view('client.details-quotation', compact('quotationID'));
  // }

  public function getQuotationDetails($id)
  {
    $quotationDetails = QuotationDetails::where('quotation_id', $id)->get();
    $quotation        = Quotation::find($id);

    return view('pharmacy.quotation-details', compact('quotationDetails', 'quotation'));
  }
}