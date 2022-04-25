<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Enum\RoleEnum;

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
    // $ads = User::role(RoleEnum::CLIENT)->orderBy('id', 'DESC')->get();


    // dd($ads);
    // return response($ads);
    return view('admin.ads', compact('ads'));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'title'       => 'required|min:5|max:100|string',
      // 'image'       => 'required|image|mimes:png,jpg', TODO
      'link'        => 'required|min:5|max:255|string',
      'ad_position' => 'required|min:5|max:100|string',
      'start_at'    => 'required|date|before:end_at',
      'end_at'      => 'required|date|after:start_at',
    ]);

    Ad::create([
      'title'       => $request->input('title'),
      'image'       => $request->input('image') ?? '',
      'link'        => $request->input('link'),
      'ad_position' => $request->input('ad_position'),
      'user_id'     => $request->input('user_id'),
      'start_at'    => $request->input('start_at'),
      'end_at'      => $request->input('end_at'),
      'user_id'     => 1
    ]);


    return redirect()->back()->with('status', 'added successfully');
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
    $request->validate([
      'title'       => 'required|min:5|max:100|string',
      // 'image'       => 'required|image|mimes:png,jpg', TODO
      'link'        => 'required|min:5|max:255|string',
      'ad_position' => 'required|min:5|max:100|string',
      'start_at'    => 'required|date|before:end_at',
      'end_at'      => 'required|date|after:start_at',
    ]);

    Ad::where('id', $id)
      ->update([
        'title'       => $request->input('title'),
        'image'       => $request->input('image') ?? '', // TODO
        'link'        => $request->input('link'),
        'ad_position' => $request->input('ad_position'),
        'start_at'    => $request->input('start_at'),
        'end_at'      => $request->input('end_at')
      ]);

    return redirect()->back()->with('status', 'edit successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return redirect()->back()->with('status', Ad::where('id', $id)->delete() ? "deleted" : 'not deleted');
  }
}
