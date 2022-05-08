<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        return view('client.index');
    }
    public function getProfile()
    {
        $client = User::find(Auth::id());

        return view('client.profile', compact('client'));
    }
}
