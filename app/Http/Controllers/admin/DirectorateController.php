<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use App\Models\Directorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirectorateController extends Controller
{
    //********* get all directorates *********//
    public function index()
    {
      $directorates = Directorate::all();
      $cities       = City::all();

      return view('admin.directorates', compact('directorates', 'cities'));
    }

    //********* create new Directorate *********//
    public function store(Request $request)
    {
      $request->validate(
      [
        'name'    => 'required|min:2|max:30|string',
        'city_id' => 'required',
      ]);

      Directorate::create(
      [
        'name'    => $request->input('name'),
        'city_id' => $request->input('city_id'),
      ]);

      return redirect()->back()->with('status', 'تمت الإضافة بنجاح');
    }

    //********* update Directorate by id *********//
    public function update(Request $request, $id)
    {
      $request->validate(
      [
        'name'    => 'required|min:2|max:30|string',
        'city_id' => 'required',
      ]);

      Directorate::find($id)->update(
      [
        'name'    => $request->input('name'),
        'city_id' => $request->input('city_id')
      ]);

      return redirect()->back()->with('status', 'تمت التعديل بنجاح');
    }

    //********* delete directorate by id *********//
    public function destroy($id)
    {
      return redirect()->back()->with('status', Directorate::find($id)->delete() ? "تم الحذف بنجاح" : 'يبدو أن هناك مشكلة');
    }
}
