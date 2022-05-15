<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
      return view('admin.users');
    }

  public function userProfile($id)
  {
    $user = User::find($id);
    return view('admin.user-profile', compact('user'));
  }
}
