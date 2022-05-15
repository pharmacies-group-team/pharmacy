<?php

namespace App\Http\Controllers\directorate;
use App\Models\Directorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DirectorateController extends Controller
{

    public function index()
    {
      $directorates = Directorate::get();
      return response($directorates);
    // return view('directorates', compact('directorates'));
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|min:2|max:30|string',
        'city_id' => 'required','city_id' => 'required',
      ]);
      Directorate::create([
        'name' => $request->input('name'),
        'city_id' => $request->input('city_id'),
      ]);

      return response(['added successfully', $validator->errors()]);
    //  return redirect()->back()->with('status', 'added successfully');
    }

    public function show($id)
    {
      $directorates = Directorate::where('id', $id)->get();
      return response($directorates);
    }

    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|min:2|max:30|string',
        'city_id' => 'required',
      ]);
      Directorate::where('id', $id)
        ->update([
          'name' => $request->input('name'),
          'city_id' => $request->input('city_id')
        ]);
       // return redirect()->back()->with('status', 'edit successfully');
        return response(['edit successfully', $validator->errors()]);
    }

    public function destroy($id)
    {
      return Directorate::where('id', $id)->delete() ? "deleted" : 'not deleted';
      //return redirect()->back()->with('status', Ad::where('id', $id)->delete() ? "deleted" : 'not deleted');
    }
}
