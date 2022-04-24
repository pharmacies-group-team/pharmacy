<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Service;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SiteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $homeData = [];

    $homeData['about-us']   = AboutUs::first();
    $homeData['services']   = Service::all();
    $homeData['contact-us'] = ContactUs::first();
    $homeData['social']     = SocialMedia::first();

    return response($homeData);
  }

  // about us
  public function updateAboutUs(Request $request)
  {
    $request->validate([
      "title"     => 'required|min:10|string|max:100',
      "sub_title" => 'required|min:20|string|max:100',
      "about"     => 'nullable|min:20|string|max:255'
    ]);

    $result = AboutUs::where([])->first()->update([
      "title"     => $request->input('title'),
      "sub_title" => $request->input('sub_title'),
      "about"     => $request->input('about') ?? AboutUs::first()->about,
    ]);

    return ['updated' => $result, 'data' => AboutUs::first()];
  }

  // add service
  public function addService(Request $request)
  {
    $request->validate([
      "name" => 'required|min:10|string|max:100',
      "desc" => 'required|min:10|string|max:255',
      "icon" => 'required|image|mimes:png,jpg'
    ]);

    $result = Service::create([
      "name"    => $request->input('name'),
      "desc"    => $request->input('desc'),
      "icon"    => $request->input('icon'),
      'user_id' => $request->input('user_id')
    ]);

    return ['added' => $result, 'data' => Service::all()];
  }

  // update services
  public function updateService(Request $request, $id)
  {
    $request->validate([
      "name" => 'required|min:10|string',
      "desc" => 'required|min:10|string',
      "icon" => 'required|image|mimes:png,jpg'
    ]);

    $result = Service::where('id', $id)->update([
      "name" => $request->input('name'),
      "desc" => $request->input('desc'),
      "icon" => $request->input('icon'),
    ]);

    return ['updated' => $result, 'data' => Service::find($id)];
  }

  // update contact us
  public function updateContactUs(Request $request)
  {
    $request->validate([
      "phone" => 'required|min:9|numeric',
      "email" => 'required|min:5|email',
    ]);

    $result = ContactUs::first()->update([
      "phone" => $request->input('phone'),
      "email" => $request->input('email'),
    ]);

    return ['updated' => $result, 'data' => ContactUs::first()];
  }

  // update social
  public function updateSocial(Request $request)
  {
    $request->validate([
      "facebook"  => 'required|min:5|max:255',
      "whatsapp"  => 'required|min:5|max:255',
      "twitter"   => 'required|min:5|max:255',
      "instagram" => 'required|min:5|max:255',
    ]);

    $result = SocialMedia::first()->update([
      "facebook"    => $request->input('facebook'),
      "whatsapp"    => $request->input('whatsapp'),
      "twitter"     => $request->input('twitter'),
      "instagram"   => $request->input('instagram'),
    ]);

    return ['updated' => $result, 'data' => SocialMedia::first()];
  }
}
