<?php

namespace App\Http\Controllers\pharmacylocation;
use App\Models\Neighborhood;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class NeighborhoodController extends Controller
{

    public function index()
    {
      $neighborhoods = Neighborhood::get();
      return response($neighborhoods);
      // return view('neighborhoods', compact('neighborhoods'));
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|min:2|max:30|string',
        'directorate_id' => 'required'
      ]);
      Neighborhood::create([
        'name' => $request->input('name'),
        'directorate_id' => $request->input('directorate_id'),
      ]);

      return response(['added successfully', $validator->errors()]);
    //  return redirect()->back()->with('status', 'added successfully');
    }

    public function show($id)
    {
      $neighborhoods = Neighborhood::where('id', $id)->get();
      return response($neighborhoods);
    }

    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|min:2|max:30|string',
        'directorate_id' => 'required',
      ]);
      Neighborhood::where('id', $id)
        ->update([
          'name' => $request->input('name'),
          'directorate_id' => $request->input('directorate_id')
        ]);
      //  return redirect()->back()->with('status', 'edit successfully');
      return response(['edit successfully', $validator->errors()]);
    }

    public function destroy($id)
    {
      return Neighborhood::where('id', $id)->delete() ? "deleted" : 'not deleted';
      //return redirect()->back()->with('status', Ad::where('id', $id)->delete() ? "deleted" : 'not deleted');
    }
}
