<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\PharmacyContact;
use App\Models\User;
use App\Services\NotificationAdminService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class RegisterPharmacyController extends Controller
{
  //********* page pharmacy register *********//
  public function index()
  {
    return view('auth.register_pharmacy');
  }

  //********* If the user wants to register as a pharmacist  *********//
  public function store(Request $request)
  {
    $request->validate(
      [
        'name'            => ['required', 'string', 'max:255'],
        'email'           => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password'        => ['required', 'string', 'min:8', 'confirmed'],
        'namePharma'      => ['required', 'string', 'min:8', 'max:255'],
        'phone'           => 'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:8|max:9|starts_with:77,73,71,70,0',
      ]);

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
      ]);

    PharmacyContact::create(
      [
        'phone'       => $request->input('phone'),
        'pharmacy_id' => $pharmacy->id
      ]);

    try {
      // send and save notification in DB
      NotificationAdminService::newPharmacy($user);
    }
    catch (Throwable $e) {
      report($e);
    }

    return view('auth.verify');
  }
}
