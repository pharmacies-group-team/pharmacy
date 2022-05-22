<?php

namespace App\Http\Controllers\pharmacy;

//quotation_details
use App\Http\Controllers\Controller;
use App\Models\Pharmacy;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PharmacyController extends Controller
{



  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pharmacies = Pharmacy::with(['user', 'social', 'neighborhood.directorate.city'])->get();

    return response($pharmacies);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name'            => 'required|min:5|max:100|string',
      'logo'            => 'required|image|mimes:png,jpg',
      'user_id'         => 'required|numeric|max:12',
      'neighborhood_id' => 'required|numeric|max:12',
      'Commercial_record'  => 'required|image|mimes:png,jpg'
    ]);

    Pharmacy::create([
      'name'            => $request->input('name'),
      'logo'            => $request->input('logo'),
      'user_id'         => $request->input('user_id'),
      'neighborhood_id' => $request->input('neighborhood_id'),
      'Commercial_record'  =>$request->input('Commercial_record'),
    ]);

    return response(['added successfully', $validator->errors()]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $pharmacy = Pharmacy::with(['user', 'social', 'neighborhood.directorate.city'])->where('id', $id)->get();
    return response($pharmacy);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'name'            => 'required|min:5|max:100|string',
      'logo'            => 'required|image|mimes:png,jpg',
      'user_id'         => 'required|numeric|max:12',
      'neighborhood_id' => 'required|numeric|max:12'
    ]);

    Pharmacy::where('id', $id)
      ->update([
        'name'            => $request->input('name'),
        'logo'            => $request->input('logo'),
        'user_id'         => $request->input('user_id'),
        'neighborhood_id' => $request->input('neighborhood_id'),
        'about'           => $request->input('about')
      ]);

    return response(['edit successfully', $validator->errors()]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return Pharmacy::where('id', $id)->delete() ? "deleted" : 'not deleted';
  }




}
