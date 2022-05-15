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

    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        //
    }
}
