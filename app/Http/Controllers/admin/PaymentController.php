<?php

namespace App\Http\Controllers\admin;

use App\Enum\PaymentEnum;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    //index
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payments', compact('payments'));
    }

    // add
    public function store(Request $request)
    {
        // validator
        Validator::validate($request->all(), Payment::roles(), Payment::messages());

        $image = $this->storeImage($request->file('image'), PaymentEnum::IMAGE_PATH);

        if ($image) {
          Payment::create(
          [
            'name'       => $request->input('name'),
            'image'      => $image,
            'bank_name'  => $request->input('bank_name'),
          ]);
        }

        return redirect()->back()->with('status', 'تم إضافة طريقة دفع بنجاح.');
    }

    // update
    public function update(Request $request, $id)
    {
        // validator
        Validator::validate($request->all(),
          [
            'image'       => 'image|mimes:jpeg,jpg,png,svg|max:2048',
            'name'        => 'required|min:5|max:100|string',
            'bank_name'   => 'required|min:5|max:100|string',
          ], Payment::messages());

        $imageOldName = Payment::find($id)->image;

        if ($request->file('image')) {
          $imageName = $this->updateImage($request->file('image'), PaymentEnum::IMAGE_PATH, $imageOldName);
        } else {
          $imageName = $imageOldName;
        }

        Payment::where('id', $id)->update(
          [
            'name'       => $request->input('name'),
            'image'      => $imageName,
            'bank_name'  => $request->input('bank_name'),
          ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح.');
    }

    // delete
    public function destroy($id)
    {
        $imageName = Payment::find($id)->image;

        $this->deleteImage($imageName);

        return redirect()->back()->with('status', Payment::where('id', $id)->delete() ? "تم الحذف بنجاح." : 'لم يتم الحذف !');
    }
}
