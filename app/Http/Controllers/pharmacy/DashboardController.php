<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pharmacy.index');
    }

    public function profile()
    {
        $pharmacy = Auth::user()->pharmacy()->first();

        return view('pharmacy.profile', compact('pharmacy'));
    }

    public function messages()
    {
        return view('pharmacy.messages');
    }

    public function accountSettings()
    {
        $user = Auth::user();
        return view('pharmacy.account-settings', compact('user'));
    }

    public function getInvoiceProfile()
    {
        $user = Auth::user();
        return view('pharmacy.invoice-profile', compact('user'));
    }
}

