<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Service;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Helper;

class HomeController extends Controller
{
  public function index()
  {
    $homeData = [];

    $homeData['about-us'] = AboutUs::first();
    $homeData['services'] = Service::all();
    $homeData['contact-us'] = ContactUs::first();
    $homeData['social'] = SocialMedia::first();

    return response($homeData);
  }
}
