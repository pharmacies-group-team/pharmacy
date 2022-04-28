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
         // $n= 0 ;

          public function index(){
          $City = City::select('id','name')->get();
          $Dirc = Directorate::select('id','name','city_id')->get();
          $neighborhood = Neighborhood::select('id','name','directorate_id')->get();
          $pharmacy  = Pharmacy::with('directorates','neighborhoods','cities')->paginate(25);
          return view('pharmacies',[
          'cities' => $City,
          'directorates' => $Dirc,
          'neighborhoods' => $neighborhood,
          'pharmacies' => $pharmacy,
          ]);

        }
        // public function show(Request $request)
        // {
        //   $name = $request->query('pharmacy');
        //   $pharmacy = Pharmacy::where('name','LIKE','%'.$name.'%')->get();
        //   return response($pharmacy);
        // }
        // public function showByNieg($nig)
        // {
        //   $neighborhood = Neighborhood::with('pharmacies')->find($nig);
        //   return response($neighborhood);
        // }
        // public function showBydir($dir)
        // {
        //   $Dirc = Directorate::with('neighborhoods.pharmacies')->find($dir);
        //   return response($Dirc);
        // }
  //       public function showPharmacies()
  // {
  //           $pharmacies    = Pharmacy::all();
  //           $cities        = City::all();
  //           $directorates  = Directorate::all();
  //           $neighborhoods = Neighborhood::all();
  //           return view('web.pharmacies', compact('pharmacies', 'cities', 'directorates', 'neighborhoods'));
  //        }
        public function showBycity($id)
        {
          $Cit = City::with('directorates')->find($id);
          if($id){
          $dir = $Cit-> directorates;
          foreach($dir as $direct){
          echo   $direct -> name .'<br>';
          return view('web.pharmacies', compact('pharmacies', 'cities', 'directorates'));
        }

         }
          // return response($dir);
        }
        public function showByNieg($city)
        {
          $cities  = City::with('directorates')->find($city);
         $dir =  $cities -> directorates;
         foreach($dir as $directorates){
     //     echo   $Directorate -> name .'<br>';
//                                                   compact
          return view('web.pharmacies',compact('directorates'));
        }  }
      //-------------------------
      public function showPharmacies()
          {
            $pharmacies    = Pharmacy::all();
            $cities        = City::all();
            $directorates  = Directorate::all();
            $neighborhoods = Neighborhood::all();
            return view('web.pharmacies', compact('pharmacies', 'cities', 'directorates', 'neighborhoods'));
          }

}
