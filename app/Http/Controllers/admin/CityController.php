<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{

    public function index()
    {
      $cities = City::all();
      return view('admin.cities', compact('cities'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
          // min:2 becouse some cities in Yemen can be two litter like Ab
          'name' => 'required|min:2|max:30|string',
        ]);
        City::create([
          'name' => $request->input('name'),
        ]);

        return response(['added successfully', $validator->errors()]);
      //  return redirect()->back()->with('status', 'added successfully');
    }

    public function show($id)
    {
      $cityies = City::where('id', $id)->get();
      return response($cityies);
    }

    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|min:2|max:30|string',
      ]);

      City::where('id', $id)
        ->update([
          'name' => $request->input('name')
        ]);
       // return redirect()->back()->with('status', 'edit successfully');
        return response(['edit successfully', $validator->errors()]);
    }

    public function destroy($id)
    {
      return City::where('id', $id)->delete() ? "deleted" : 'not deleted';
      //return redirect()->back()->with('status', Ad::where('id', $id)->delete() ? "deleted" : 'not deleted');
    }
}
