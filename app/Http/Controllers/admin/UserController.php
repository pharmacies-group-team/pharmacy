<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
      $users = User::all();
      return view('admin.users', compact('users'));
    }
}
