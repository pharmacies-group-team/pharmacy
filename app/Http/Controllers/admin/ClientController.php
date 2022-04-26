<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enum\RoleEnum;


class ClientController extends Controller
{
  public function index()
  {
    $users = User::role(RoleEnum::CLIENT)->orderBy('id', 'DESC')->get();

    return view('admin.clients', compact('users'));
  }

  public function clientToggle(Request $request, $id)
  {
    $result = User::where('id', $id)->update(['is_active' => !User::find($id)->is_active]);

    return redirect()->back()->with('status', $result ? ' change client statue successfully' : 'failed');
  }
}
