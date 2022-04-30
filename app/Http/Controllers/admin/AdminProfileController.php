<?php

namespace App\Http\Controllers\admin;

use App\Enum\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

class AdminProfileController extends Controller
{
  public function index(Request $request)
  {
    $user = User::role(RoleEnum::SUPER_ADMIN)->first();

    return view('admin.profile')->with('user', $user);
  }

  public function updateProfile(Request $request)
  {
    $request->validate([
      'name' => 'required|alpha|min:3|max:90',
      'email' => 'required|email|min:3|max:50'
    ]);

    $result = User::role(RoleEnum::SUPER_ADMIN)
      ->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
      ]);

    return redirect()->back()->with('status',  $result ? 'updated successfully' : 'updated failed');
  }
}
