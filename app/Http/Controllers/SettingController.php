<?php

namespace App\Http\Controllers;

use App\Enum\PharmacyEnum;
use App\Enum\UserEnum;
use App\Models\Pharmacy;
use App\Models\User;
use App\Traits\UploadsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
  use UploadsTrait;

  public function index()
  {
    return view('pharmacy.dashboard.setting');
  }

  public function updateAccount(Request $request)
  {
    $user = User::find(Auth::id());

    $request->validate(
      [
        'name'      => ['required', 'string', 'max:255'],
        'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
      ]
    );

    $user->name      = $request->input('name');
    $user->email     = $request->input('email');
    $user->update();

    return redirect()->back()
      ->with('success', 'تم تحديث بياناتك');
  }

  public function updateAvatar(Request $request)
  {
    $request->validate(['avatar' => 'required|image|mimes:png,jpg,svg']);
    $avatar = $this->updateImage(
      $request->avatar,
      UserEnum::USER_AVATAR_PATH,
      UserEnum::USER_AVATAR_PATH . Auth::user()->avatar
    );

    User::find(Auth::id())->update(['avatar' => $avatar]);

    return redirect()->back()
      ->with('success', 'تم التعديل بنجاح');
  }

  public function updateLogo(Request $request)
  {
    $request->validate(['logo' => 'required|image|mimes:png,jpg,svg']);
    $logo = $this->updateImage(
      $request->logo,
      PharmacyEnum::PHARMACY_LOGO_PATH,
      PharmacyEnum::PHARMACY_LOGO_PATH . Auth::user()->pharmacy->logo
    );

    $pharmacy = Pharmacy::where('user_id', Auth::id())->first();
    $pharmacy->update(['logo' => $logo]);

    return redirect()->back()
      ->with('success', 'تم التعديل بنجاح');
  }
}
