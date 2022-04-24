<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\{AboutUs, City, ContactUs, Directorate, Neighborhood, Pharmacy, Service, SocialMedia};

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
        $pharmacies    = Pharmacy::all();
        $cities        = City::all();
        $directorates  = Directorate::all();
        $neighborhoods = Neighborhood::all();

        return view('web.pharmacies', compact('pharmacies','cities', 'directorates', 'neighborhoods'));
    }

    public function showPharmacy($id)
    {
      $pharmacy = Pharmacy::find($id);

      return view('pharmacy.profile', compact('pharmacy'));
    }
}
