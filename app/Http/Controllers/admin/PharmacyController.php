<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
  public function index()
  {
    $pharmacies = Pharmacy::select()->with('neighborhood.directorate.city')->get();

    return response($pharmacies);
  }
}
