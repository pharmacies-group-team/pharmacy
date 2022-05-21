<?php

namespace App\Http\Controllers\admin;

use App\Models\Directorate;
use App\Models\Neighborhood;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NeighborhoodController extends Controller
{

    public function index()
    {
      $neighborhoods = Neighborhood::all();
      $directorates  = Directorate::all();
      return view('admin.neighborhoods', compact('neighborhoods', 'directorates'));
    }

    public function store(Request $request)
    {
      $request->validate(
      [
        'name'           => 'required|min:2|max:30|string',
        'directorate_id' => 'required',
      ]);

      Neighborhood::create([
        'name'           => $request->input('name'),
        'directorate_id' => $request->input('directorate_id'),
      ]);

      return redirect()->back()->with('status', 'تمت الإضافة بنجاح');
    }

    public function update(Request $request, $id)
    {
      $request->validate(
      [
        'name'           => 'required|min:2|max:30|string',
        'directorate_id' => 'required',
      ]);

      Neighborhood::find($id)->update(
      [
        'name'           => $request->input('name'),
        'directorate_id' => $request->input('directorate_id')
      ]);

      return redirect()->back()->with('status', 'تمت التعديل بنجاح');
    }

    public function destroy($id)
    {
      return redirect()->back()->with('status', Neighborhood::find($id)->delete() ? "تم الحذف بنجاح" : 'يبدو أن هناك مشكلة');
    }
}
