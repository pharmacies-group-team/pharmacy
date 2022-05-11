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


    public function accountSettings()
    {
        $user = Auth::user();
        return view('client.account-setting', compact('user'));
    }

    public function address()
    {
        return view('client.address');
    }

    public function invoiceProfile()
    {
        $user = Auth::user();

        return view('client.invoice-profile', compact('user'));
    }
}
