<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Pharmacy;
use App\Models\Service;
use App\Models\SocialMedia;

class HomeController extends Controller
{
    public function index()
    {
        $aboutUs    = AboutUs::first();
        $services   = Service::all();
        $contactUs  = ContactUs::first();
        $social     = SocialMedia::first();
        $pharmacies = Pharmacy::all();

        return view('index', compact('aboutUs', 'services', 'contactUs', 'social', 'pharmacies'));
    }

    public function showPharmacies()
    {
        $pharmacies = Pharmacy::all();
        return view('web.pharmacies', compact('pharmacies'));
    }

    public function showPharmacy($id)
    {
      $pharmacy = Pharmacy::with(['user', 'social', 'neighborhood.directorate.city'])->where('id', $id)->get();

      return response($pharmacy);
    }
}
