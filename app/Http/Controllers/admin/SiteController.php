<?php

namespace App\Http\Controllers\admin;

use App\Enum\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Service;
use App\Models\SocialMedia;
use App\Models\User;
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
    $services = Service::all();
    $contactUs = ContactUs::first();
    $social = SocialMedia::first();

    $aboutUs = AboutUs::first();

    return view('admin.manage-pages', compact('services', 'contactUs', 'social', 'aboutUs'));
  }

  // about us
  public function updateAboutUs(Request $request)
  {
    $request->validate([
      "title"     => 'required|min:5|max:100|string',
      "sub_title" => 'required|min:20|max:500|string',
      "about"     => 'nullable|min:20|max:255|string'
    ]);

    $result = AboutUs::where([])->first()->update([
      "title"     => $request->input('title'),
      "sub_title" => $request->input('sub_title'),
      "about"     => $request->input('about') ?? AboutUs::first()->about,
    ]);
    return redirect()->back()->with('status', 'updated about us');
  }

  // add service
  public function addService(Request $request)
  {
    $request->validate([
      "name" => 'required|min:10|max:100|string',
      "desc" => 'required|min:10|max:255|string',
      "icon" => 'required|image|mimes:png,jpg'
    ]);


    $imageName = $this->storeImage($request->file('icon'), 'uploads/services');

    if ($imageName) {

      $result = Service::create([
        "name"    => $request->input('name'),
        "desc"    => $request->input('desc'),
        "icon"    => $imageName,
        'user_id' => User::role(RoleEnum::SUPER_ADMIN)->first()->id
      ]);
    } else {
      $result = false;
    }

    return redirect()->back()->with('status', $result ? 'تمت العملية بنجاح.' : 'failed');
  }

  // update services
  public function updateService(Request $request, $id)
  {
    $request->validate([
      "name" => 'required|min:10|string',
      "desc" => 'required|min:10|string',
      "icon" => 'nullable|image|mimes:png,jpg'
    ]);

    $imageName = $this->storeImage($request->file('icon'), 'uploads/services');

    if ($imageName) {
      $result = Service::where('id', $id)->update([
        "name" => $request->input('name'),
        "desc" => $request->input('desc'),
        "icon" => $imageName
      ]);
    } else {
      $result = Service::where('id', $id)->update([
        "name" => $request->input('name'),
        "desc" => $request->input('desc'),
      ]);
    }

    return redirect()->back()->with('status',  'تمت العملية بنجاح.');
  }

  public function deleteService(Request $request, $id)
  {
    $result = Service::where('id', $id)->delete();

    return redirect()->back()->with('status', $result ? 'تمت العملية بنجاح.' : 'failed');
  }

  // update contact us
  public function updateContactUs(Request $request)
  {
    $request->validate([
      "phone" => 'required|min:9|numeric',
      "email" => 'required|min:5|email'
    ]);

    $result = ContactUs::first()->update([
      "phone" => $request->input('phone'),
      "email" => $request->input('email'),
    ]);
    return redirect()->back();

    // return ['updated' => $result, 'data' => ContactUs::first()];
  }

  // update social
  public function updateSocial(Request $request)
  {
    $request->validate([
      "facebook"  => 'nullable|min:5|max:255|url',
      "whatsapp"  => 'nullable|min:5|max:255|url',
      "twitter"   => 'nullable|min:5|max:255|url',
      "instagram" => 'nullable|min:5|max:255|url',
    ]);

    $result = SocialMedia::first()->update([
      "facebook"    => $request->input('facebook'),
      "whatsapp"    => $request->input('whatsapp'),
      "twitter"     => $request->input('twitter'),
      "instagram"   => $request->input('instagram'),
    ]);
    return redirect()->back()->with('status', $result ? 'تمت العملية بنجاح.' : 'failed');
  }
}
