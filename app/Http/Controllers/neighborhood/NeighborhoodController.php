<?php

namespace App\Http\Controllers\Neighborhood;
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
        //
    }

    public function show($id)
    {
      $neighborhoods = Neighborhood::where('id', $id)->get();
      return response($neighborhoods);
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
