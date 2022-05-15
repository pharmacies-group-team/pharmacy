<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\{AboutUs, Ad, City, ContactUs, Directorate, Neighborhood, Pharmacy, Service, SocialMedia};
use Carbon\Carbon;

class HomeController extends Controller
{
  public function index()
  {
    $aboutUs    = AboutUs::first();
    $services   = Service::all();
    $contactUs  = ContactUs::first();
    $social     = SocialMedia::first();
    $pharmacies = Pharmacy::all();
    $ads        = Ad::where('start_at', '<=', Carbon::now()->format('Y-m-d'))
      ->where('end_at', '>=', Carbon::now()->format('Y-m-d'))->get();

    return view('index', compact(
      'aboutUs',
      'services',
      'contactUs',
      'social',
      'pharmacies',
      'ads'
    ));
  }

  public function showPharmacies()
  {
    return view('web.pharmacies');
  }

  public function showPharmacy($id)
  {
    $pharmacy = Pharmacy::find($id);

    return view('web.profile', compact('pharmacy'));
  }

  public function showPrivacy()
  {
    return view('web.privacy');
  }

  public function showContactUs()
  {
    return view('web.contact-us');
  }

  public function showAboutUs()
  {
    return view('web.about-us');
  }
}
