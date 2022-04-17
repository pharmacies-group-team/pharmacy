<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pharmacyViewsController extends Controller
{
    //
    public function viewPharmcies(){
        return view('pharmacy.veiw_pharmacies');
    }
}
