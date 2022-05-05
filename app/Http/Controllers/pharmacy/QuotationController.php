<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function createQuotation($id)
    {
        $order = Order::find($id);
        return view('0-testing.create-quotation', compact('order'));
    }

}
