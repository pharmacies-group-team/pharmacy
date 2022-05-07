<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function getQuotationDetails($id)
    {
      $quotationID = $id;
      return view('client.testing-details-quotation',compact('quotationID'));
    }
}
