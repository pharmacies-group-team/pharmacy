<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    //********* get all cities *********//
    public function index()
    {
      $cities = City::all();
      return view('admin.cities', compact('cities'));
    }

    //********* create new city *********//
    public function store(Request $request)
    {
      $request->validate([ 'name' => 'required|min:2|max:30|string' ]);

      City::create([ 'name' => $request->input('name') ]);

      return redirect()->back()->with('status', 'تمت الإضافة بنجاح');
    }

    //********* update city by id *********//
    public function update(Request $request, $id)
    {
      $request->validate([ 'name' => 'required|min:2|max:30|string' ]);

      City::find($id)->update([ 'name' => $request->input('name') ]);

      return redirect()->back()->with('status', 'تمت التعديل بنجاح');
    }

    //********* delete city by id *********//
    public function destroy($id)
    {
      return redirect()->back()->with('status', City::find($id)->delete() ? "تم الحذف بنجاح" : 'يبدو أن هناك مشكلة');
    }
}
