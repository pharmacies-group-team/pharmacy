<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
  public function index(Request $request)
  {
    // TODO
    $id = $request->query('id');

    $adminData = User::select()
      ->where('id', $id)
      ->first();
    return response($adminData);
  }

  public function updateProfile(Request $request)
  {
    // TODO
    $id = $request->input('id');

    $request->validate([
      'full_name'   => 'required|string|min:3|max:50',
      'phone'       => 'required|min:9|max:16|numeric'
    ]);

    $result = User::where('id', $id)
      ->update([
        'full_name' => $request->input('full_name'),
        'phone'     => $request->input('phone'),
      ]);

    return response([
      'updated'   => (bool) $result,
      'user_data' => User::find($id) ?? []
    ]);
  }
}
