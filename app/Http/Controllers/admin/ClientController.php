<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
  public function index()
  {
    $users = Client::select()->with(['user'])->get();

    return response($users);
  }
}
