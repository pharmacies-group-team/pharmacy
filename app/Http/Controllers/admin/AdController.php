<?php

namespace App\Http\Controllers\admin;

use App\Enum\AdEnum;
use App\Enum\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdController extends Controller
{
  //index
  public function index()
  {
    $ads = Ad::all();

    return view('admin.ads', compact('ads'));
  }

  // add
  public function store(Request $request)
  {
    $request->validate([
      'title'       => 'required|min:5|max:100|string',
      'image'       => 'required|image|mimes:png,jpg',
      'link'        => 'required|min:5|max:255|url',
      'ad_position' => 'required',
      'start_at'    => 'required|date|before:end_at|after_or_equal:today',
      'end_at'      => 'required|date|after:start_at',
    ]);

    $imageName = $this->storeImage($request->file('image'), AdEnum::AD_PATH);

    if ($imageName) {
      Ad::create([
        'title'       => $request->input('title'),
        'image'       => $imageName,
        'link'        => $request->input('link'),
        'ad_position' => $request->input('ad_position'),
        'start_at'    => $request->input('start_at'),
        'end_at'      => $request->input('end_at'),
        'user_id'     => Auth::id()
      ]);
    }

    return redirect()->back()->with('status', 'تم إضافة الإعلان بنجاح.');
  }

  // update
  public function update(Request $request, $id)
  {
    $request->validate([
      'title'       => 'required|min:5|max:100|string',
      'image'       => 'image|mimes:png,jpg',
      'link'        => 'required|min:5|max:255|url',
      'ad_position' => 'required|min:5|max:100|string',
      'start_at'    => 'required|date|before:end_at',
      'end_at'      => 'required|date|after:start_at',
    ]);

    $imageOldName = Ad::find($id)->image;

    if ($request->file('image')) {
      $imageName = $this->updateImage($request->file('image'), AdEnum::AD_PATH, $imageOldName);
    } else {
      $imageName = $imageOldName;
    }

    Ad::where('id', $id)
      ->update([
        'title'       => $request->input('title'),
        'image'       => $imageName,
        'link'        => $request->input('link'),
        'ad_position' => $request->input('ad_position'),
        'start_at'    => $request->input('start_at'),
        'end_at'      => $request->input('end_at')
      ]);

    return redirect()->back()->with('status', 'تم تعديل الإعلان بنجاح');
  }

  // delete
  public function destroy($id)
  {
    $imageName = Ad::find($id)->image;

    $this->deleteImage($imageName);

    return redirect()->back()->with('status', Ad::where('id', $id)->delete() ? "تم حذف الإعلان بنجاح." : 'عذراَ قد يوجد هناك مشكلة.');
  }
}