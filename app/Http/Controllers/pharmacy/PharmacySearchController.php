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
        // public function index(Request $request){
        //   return Pharmacy::filter($request)->get();
        // }
        public function show($name)
        {
          // $pharmacy = Pharmacy::with(['user', 'social', 'neighborhood.directorate.city'])->where('name', $name)->get();
          // return response($pharmacy);
          // $name = $_GET['name'];
          $pharmacy = Pharmacy::where('name','LIKE','%'.$name.'%')->get();
          return response($pharmacy);
        }
        public function showByNieg($nig)
        {
         // $pharmacy = Pharmacy::with(['user', 'social', 'neighborhood.directorate.city'])->where('neighborhood_id', $dir)->get();
          $neighborhood = Neighborhood::with('pharmacies')->find($nig);
          return response($neighborhood);
        }
        public function showBydir($dir)
        {
         // $pharmacy = Pharmacy::with(['user', 'social', 'neighborhood.directorate.city'])->where('neighborhood_id', $dir)->get();
          $Dirc = Directorate::with('neighborhoods.pharmacies')->find($dir);
          return response($Dirc);
        }
        public function showBycity($city)
        {
          $Cit =City::with('directorates.neighborhoods.pharmacies')->find($city);
          return response($Cit);
        }

    //
  //   public function index(){
  //   $cities = City::select('id','name')->get();
  //   $neigborhoodes = Neighborhood::select('id','name')->get();
  //   $pharmacies = Pharmacy::with('cities','niegborhoodies')->paginate(52);
  //   return response('home',['cities'=>$cities,
  //   'neighbordhoodies'=>$neigborhoodes,
  //   'pharmacies'=>$pharmacies]);
  // }
  // ToDo
  // public function searchFilter($city_id){
  // $pharmacies = Pharmacy::with('Neighborhood','Neighborhood.directorates')->where('city_id,$city_id')
  // ->get();
  // if($pharmacies->isEmpty())
  // return response()->json(array('messge' => 'no item are avilable'));
  // }
}
