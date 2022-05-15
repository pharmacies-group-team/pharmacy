<?php

namespace App\Http\Controllers\Auth;

use App\Enum\RoleEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginCustomController extends Controller
{
  public function login(Request $request)
  {
    Validator::validate($request->all(), [
      'email'     => ['email', 'required'],
      'password'  => ['required']
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

      if (Auth::user()->is_active === 1) {
        if (Auth::user()->hasRole(RoleEnum::SUPER_ADMIN))
          return redirect()->route('admin.users.index');

        elseif (Auth::user()->hasRole(RoleEnum::PHARMACY)) {
          if (Auth::user()->email_verified_at == null)
            return view('auth.verify');
          return redirect()->route('pharmacy.profile');
        } else {
          if (Auth::user()->email_verified_at == null)
            return view('auth.verify');
          return redirect()->route('home');
        }
      } elseif (Auth::user()->hasRole(RoleEnum::PHARMACY)) {
        Auth::logout();
        return view('message.pharmacy-not-active');
      } else {
        Auth::logout();
        return view('message.user-not-active');
      }
    } else {
      return redirect()->route('login')->with(['status' => 'يرجى التحقق من الايميل وكلمة السر ']);
    }
  }
}
