<?php

namespace App\Http\Controllers\pharmacy;

use App\Enum\PharmacyEnum;
use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function updateLogo(Request $request)
    {
        // validator
        Validator::validate($request->all(), Pharmacy::rolesLogo(), Pharmacy::messagesLogo());

        $logo = $this->updateImage(
          $request->logo,
          PharmacyEnum::PHARMACY_LOGO_PATH,
          PharmacyEnum::PHARMACY_LOGO_PATH . Auth::user()->pharmacy->logo
        );

        $pharmacy = Pharmacy::where('user_id', Auth::id())->first();
        $pharmacy->update(['logo' => $logo]);

        return redirect()->back()
          ->with('status', 'تم تحديث صورة صيدليتك بنجاح');
    }
}
