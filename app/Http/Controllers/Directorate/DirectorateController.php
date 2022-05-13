<?php

namespace App\Http\Controllers\Directorate;

use App\Http\Controllers\Controller;
use App\Models\Directorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DirectorateController extends Controller
{
    public function index()
    {
        //
        $directorates = Directorate::get();
        return response($directorates);
    }

    public function store(Request $request)
    {

    }

    public function show()
    {

    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy($id)
    {
      //
    }
}
