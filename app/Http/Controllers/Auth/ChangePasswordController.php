<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
  public function updatePassword(Request $request)
  {
      # Validation
      $request->validate([
        'old_password' => ['required', 'string', 'min:8'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed', 'confirmed']
      ]);


      #Match The Old Password
      if(!Hash::check($request->old_password, Auth::user()->password)){
        return back()->with("error", "كلمة السر القديمة غير صحيحة!");
      }


      #Update the new Password
      User::whereId(Auth::id())->update([
        'password' => Hash::make($request->new_password)
      ]);

      return back()
        ->with('success', 'تم تغير كلمة السر بنجاح');
  }
}
