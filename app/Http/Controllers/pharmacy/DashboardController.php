<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pharmacy.dashboard.index');
    }

    public function profile()
    {
        $pharmacy = Pharmacy::find(1)->with(['user', 'social', 'neighborhood.directorate.city'])->get();

        return view('pharmacy.dashboard.profile', compact('pharmacy'));
    }

    public function messages()
    {
        return view('pharmacy.dashboard.messages');
    }

    public function accountSettings()
    {
        return view('pharmacy.dashboard.account-settings');
    }
}
