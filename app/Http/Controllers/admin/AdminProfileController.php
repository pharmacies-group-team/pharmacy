<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
  public function index(Request $request)
  {
    // TODO
    $id = $request->query('id');

    $adminData = User::select('name', 'email')->where('id', $id)->first();
    return response($adminData);
  }

  public function updateProfile(Request $request)
  {
    // TODO
    $id = $request->input('id');

    $request->validate([
      'name' => 'required|string|min:3|max:50'
    ]);

    $result = User::where('id', $id)
      ->update([
        'name' => $request->input('name'),
      ]);
    return response([
      'updated'   => (bool) $result,
      'user_data' => User::find($id) ?? []
    ]);
  }
}
