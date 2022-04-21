<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $ads = Ad::all();

    return response($ads);
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
      'title' => 'required',
      'image' => 'required',
      'link' => 'required',
      'ad_position' => 'required',
      'start_at' => 'required',
      'end_at' => 'required',
    ]);

    Ad::create([
      'title' => $request->input('title'),
      'image' => $request->input('image'),
      'link' => $request->input('link'),
      'ad_position' => $request->input('ad_position'),
      'user_id' => $request->input('user_id'),
      'start_at' => $request->input('start_at'),
      'end_at' => $request->input('end_at')
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
    //
    $ad = Ad::select()->where('id', $id)->get();

    return response($ad);
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
      'title' => 'required',
      'image' => 'required',
      'link' => 'required',
      'ad_position' => 'required',
      'start_at' => 'required',
      'end_at' => 'required'
    ]);

    Ad::where('id', $id)
      ->update([
        'title' => $request->input('title'),
        'image' => $request->input('image'),
        'link' => $request->input('link'),
        'ad_position' => $request->input('ad_position'),
        'start_at' => $request->input('start_at'),
        'end_at' => $request->input('end_at')
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
    //
    return Ad::where('id', $id)->delete() ? "deleted" : 'not deleted';
  }
}
