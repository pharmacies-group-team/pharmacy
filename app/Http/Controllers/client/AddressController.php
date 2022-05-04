<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Neighborhood;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Client_id = Auth::user()->id;
      $addresses=Address::select('id','desc','lat','lng','neighborhood_id','name','phone','address_type')->where('user_id', $Client_id)->with(['neighborhood:id,name'])->get();
      // for the drop down
      $neighborhoods=Neighborhood::select()->get();

      // return response($addresses,$neighborhoods);
      // return view('client.addresses', compact('addresses','addresses'));
      return view('0-testing.clients.addresses', compact('addresses','neighborhoods'));


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
        'desc'       => 'required|min:5|max:500|string',
          'lat'       => 'required|min:5|max:50|string',
          'lng'        => 'required|min:5|max:50|string',
          'neighborhood_id' => 'required|min:1|max:10|string',
          'name' => 'required|min:3|max:55|string',
          'phone' => 'required|min:9|max:20|string',
          'address_type' => 'required|min:3|max:200|string',

      ]);
        Address::create([
          'desc'       => $request->input('desc'),
          'lat'        => $request->input('lat'),
          'lng' =>        $request->input('lng'),
          'neighborhood_id'    => $request->input('neighborhood_id'),
          'name'    => $request->input('name'),
          'phone'    => $request->input('phone'),
          'address_type'    => $request->input('address_type'),
          'user_id' =>Auth::user()->id,


        ]);


      return redirect()->back()->with('status', 'added successfully');
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
      {
        $request->validate([
          'desc'       => 'required|min:5|max:500|string',
          'lat'       => 'required|min:5|max:50|string',
          'lng'        => 'required|min:5|max:50|string',
          'neighborhood_id' => 'required|min:1|max:10|string',
          'name' => 'required|min:3|max:55|string',
          'phone' => 'required|min:9|max:20|string',
          'address_type' => 'required|min:3|max:200|string',

        ]);


        Address::where('id', $id)
          ->update([
            'desc'       => $request->input('desc'),
            'lat'        => $request->input('lat'),
            'lng' =>        $request->input('lng'),
            'neighborhood_id'    => $request->input('neighborhood_id'),
            'name'    => $request->input('name'),
            'phone'    => $request->input('phone'),
            'address_type'    => $request->input('address_type'),
            'user_id' =>Auth::user()->id,

          ]);

        return redirect()->back()->with('status', 'edit successfully');
      }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back()->with('status', Address::where('id', $id)->delete() ? "deleted" : 'not deleted');

    }
}