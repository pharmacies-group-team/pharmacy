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

    // $users = Client::select()->with(['user'])->get();
    // dd($users);

    return view('admin.clients', compact('users'));
  }
}