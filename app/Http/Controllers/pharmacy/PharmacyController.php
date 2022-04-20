<?php

namespace App\Http\Controllers\pharmacy;

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
    $pharmacies = Pharmacy::all();

    return response($pharmacies);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
      'name' => 'required',
      'logo' => 'required',
      'user_id' => 'required',
      'neighborhood_id' => 'required'
    ]);

    Pharmacy::create([
      'name' => $request->input('name'),
      'logo' => $request->input('logo'),
      'user_id' => $request->input('user_id'),
      'neighborhood_id' => $request->input('neighborhood_id'),
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
    $pharmacy = Pharmacy::select()->where('id', $id)->get();

    return response($pharmacy);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
      'name' => 'required',
      'logo' => 'required',
      'user_id' => 'required',
      'neighborhood_id' => 'required'
    ]);

    Pharmacy::where('id', $id)
      ->update([
        'name' => $request->input('name'),
        'logo' => $request->input('logo'),
        'user_id' => $request->input('user_id'),
        'neighborhood_id' => $request->input('neighborhood_id'),
        'about' => $request->input('about')
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
