<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('client.index');
    }
    public function getProfile()
    {
        return view('client.profile');
    }
}
