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
      "title"     => 'required|min:10|string|max:100',
      "sub_title" => 'required|min:20|string|max:500',
      "about"     => 'nullable|min:20|string|max:255'
    ]);

    $result = AboutUs::where([])->first()->update([
      "title"     => $request->input('title'),
      "sub_title" => $request->input('sub_title'),
      "about"     => $request->input('about') ?? AboutUs::first()->about,
    ]);
    return redirect()->back();
  }

  // add service
  public function addService(Request $request)
  {
    $request->validate([
      "name" => 'required|min:10|string|max:100',
      "desc" => 'required|min:10|string|max:255',
      "icon" => 'required|image|mimes:png,jpg'
    ]);


    $imageName = $this->storeImage($request->file('icon'), 'images/services');

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

    return redirect()->back()->with('status', 'added' . $result ? 'successfully' : 'failed');
  }

  // update services
  public function updateService(Request $request, $id)
  {
    // dd($request);
    $request->validate([
      "name" => 'required|min:10|string',
      "desc" => 'required|min:10|string',
      "icon" => 'nullable|image|mimes:png,jpg'
    ]);

    $imageName = $this->storeImage($request->file('icon'), 'images/services');

    if ($imageName) {

      $result = Service::where('id', $id)->update([
        "name" => $request->input('name'),
        "desc" => $request->input('desc'),
        "icon" => $imageName
      ]);
    }

    return redirect()->back()->with('status', 'updated' . $result ? 'successfully' : 'failed');
  }

  public function deleteService(Request $request, $id)
  {
    $result = Service::where('id', $id)->delete();

    return redirect()->back()->with('statues', 'delete done');

    // return ['updated' => $result, 'data' => Service::find($id)];
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
    return redirect()->back();

    // return ['updated' => $result, 'data' => ContactUs::first()];
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
    return redirect()->back();

    // return ['updated' => $result, 'data' => SocialMedia::first()];
  }
}
