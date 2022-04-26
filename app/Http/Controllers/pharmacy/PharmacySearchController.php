<?php

namespace App\Http\Controllers\pharmacy;
use App\Models\Pharmacy;
use App\Models\Neighborhood;
use App\Models\Directorate;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PharmacySearchController extends Controller
{
        public function show(Request $request)
        {
          $name = $request->query('pharmacy');
          $pharmacy = Pharmacy::where('name','LIKE','%'.$name.'%')->get();
          return response($pharmacy);
        }
        public function showByNieg($nig)
        {
          $neighborhood = Neighborhood::with('pharmacies')->find($nig);
          return response($neighborhood);
        }
        public function showBydir($dir)
        {
          $Dirc = Directorate::with('neighborhoods.pharmacies')->find($dir);
          return response($Dirc);
        }
        public function showBycity($city)
        {
          $Cit =City::with('directorates.neighborhoods.pharmacies')->find($city);
          return response($Cit);
        }
}
