<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Directorate;
use App\Models\Neighborhood;
use App\Models\Pharmacy;
use App\Models\PharmacyContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPharmacyController extends Controller
{
    public function index()
    {
//      $neighborhoods = Neighborhood::all();
//      $directorates  = Directorate::all();
//      $cities        = City::all();

      return view('auth.register_pharmacy');
    }

    public function store(Request $request)
    {
//      dd($request->all());
        $request->validate(
          [
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'        => ['required', 'string', 'min:8', 'confirmed'],
//            'neighborhood_id' => 'required',
            'namePharma'      => ['required', 'string', 'max:255'],
            'phone'           => ['required', 'numeric']
          ]);

        $user = User::create(
          [
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => Hash::make($request['password']),
          ]
        )->assignRole($request['roles']);

        $pharma = Pharmacy::create(
          [
            'name'            => $request->input('namePharma'),
            'user_id'         => $user->id,
          ]);

        PharmacyContact::create(
          [
            'phone'       => $request->input('phone'),
            'pharmacy_id' => $pharma->id
          ]);

        return redirect()->route('home');
    }
}
