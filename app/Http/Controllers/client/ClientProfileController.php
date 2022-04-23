<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientProfileController extends Controller
{
  public function index(Request $request)
  {
    // TODO
    $id = $request->query('id');

    $adminData = Client::select()
      ->where('id', $id)
      ->first();
    return response($adminData);
  }

  public function updateProfile(Request $request)
  {
    // TODO
    $id = $request->input('id');

    $request->validate([
      'full_name' => 'required|string|min:3|max:50',
      'phone' => 'required|min:9|max:16'
    ]);

    $result = Client::where('id', $id)
      ->update([
        'full_name' => $request->input('full_name'),
        'phone' => $request->input('phone'),
      ]);

    return response([
      'updated' => (bool) $result,
      'user_data' => Client::find($id) ?? []
    ]);
  }
}
