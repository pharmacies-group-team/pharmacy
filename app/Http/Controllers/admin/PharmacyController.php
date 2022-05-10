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
    $users = Pharmacy::all();
    
    return view('admin.pharmacies-users', compact('users'));
  }

  public function pharmacyToggle(Request $request, $id)
  {
    $result = User::where('id', $id)->update(['is_active' => !User::find($id)->is_active]);

    return redirect()->back()->with('status', $result ? 'تمت العملية بنجاح.' : 'failed');
  }
}
