<?php

namespace App\Http\Controllers\pharmacy;

use App\Enum\PharmacyEnum;
use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Traits\UploadsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    use UploadsTrait;

    public function updateLogo(Request $request)
    {
        $logo = $this->updateImage($request->logo,
          PharmacyEnum::PHARMACY_LOGO_PATH,
           PharmacyEnum::PHARMACY_LOGO_PATH.Auth::user()->pharmacy->logo);

        $pharmacy = Pharmacy::where('user_id', Auth::id())->first();
        $pharmacy->update(['logo'=>$logo]);

        return redirect()->back()
          ->with('success','updated Logo successfully');
    }
}
