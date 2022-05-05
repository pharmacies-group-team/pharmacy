<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getProfile()
    {
        return view('client.profile');
    }

    public function updateProfile(Request $request)
    {
        return redirect()->back()->with('success', 'updated');
    }
}
