<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enum\RoleEnum;

class PharmacyController extends Controller
{
  public function index()
  {
    $users = User::role(RoleEnum::PHARMACY)->orderBy('id', 'DESC')->get();

    // $pharmacies = Pharmacy::select()->with('neighborhood.directorate.city')->get();
    // dd($pharmacies);
    return view('admin.pharmacies-users', compact('users'));


    // return response($pharmacies);
  }
}