<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Directorate;
use App\Models\Neighborhood;
use App\Models\Pharmacy;
use App\Models\PharmacyContact;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPharmacyController extends Controller
{
//  use RegistersUsers;

  public function index()
  {
    return view('auth.register_pharmacy');
  }

  public function store(Request $request)
  {
    $request->validate(
      [
        'name'            => ['required', 'string', 'max:255'],
        'email'           => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password'        => ['required', 'string', 'min:8', 'confirmed'],
        'namePharma'      => ['required', 'string', 'min:8', 'max:255'],
        'phone'           => ['required', 'numeric']
      ]
    );
    event(new Registered($user = User::create(
      [
        'name'      => $request['name'],
        'email'     => $request['email'],
        'password'  => Hash::make($request['password']),
        'is_active' => 0
      ]
    )->assignRole($request['roles'])));

    $pharmacy = Pharmacy::create(
      [
        'name'      => $request->input('namePharma'),
        'user_id'   => $user->id,
      ]
    );

    PharmacyContact::create(
      [
        'phone'       => $request->input('phone'),
        'pharmacy_id' => $pharmacy->id
      ]
    );

//    $this->guard()->login($user);

    return view('auth.verify');
  }
}
