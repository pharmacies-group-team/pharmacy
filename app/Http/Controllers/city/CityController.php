<?php

namespace App\Http\Controllers\city;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{

    public function index()
    {
          $cityies = City::all();
          return response($cityies);
         // return view('cities', compact('cityies'));
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
