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
    $social     = SocialMedia::first();
    return view('web.pharmacies', compact('social'));
  }

  public function showPharmacy($id)
  {
    $social     = SocialMedia::first();
    $pharmacy = Pharmacy::find($id);

    return view('web.profile', compact('pharmacy', 'social'));
  }

  public function showPrivacy()
  {
    $social     = SocialMedia::first();

    return view('web.privacy', compact('social'));
  }

  public function showContactUs()
  {
    $social     = SocialMedia::first();

    return view('web.contact-us', compact('social'));
  }

  public function showAboutUs()
  {
    $social     = SocialMedia::first();

    return view('web.about-us', compact('social'));
  }
}
