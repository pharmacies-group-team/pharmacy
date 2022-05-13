<?php

namespace App\Http\Controllers\city;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cityies = City::all();
        return response($cityies);
        // return view('cities', compact('cityies'));
    }

    // add
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

    public function update()
    {

    }

    public function destroy($id)
    {
      return City::where('id', $id)->delete() ? "deleted" : 'not deleted';
    }
}
