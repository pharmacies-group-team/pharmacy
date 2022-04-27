<?php
namespace App\Http\Controllers\client;

namespace App\Http\Controllers\Order;

use App\Models\OrderDetails;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class ClientOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_order = OrderDetails::with(['Order'])->get();

        return response($client_order);
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
        //TODO validation
        $validator = Validator::make($request->all(), [
        
            'drug_image' => 'required',
         
            'details' => 'required',
            'order_id' => 'required'
        ]);

        OrderDetails::create([
          
            'drug_image' => $request->input('drug_image'),
      
            'details' => $request->input('details'),
            'order_id' => $request->input('order_id')

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
        $client_orderDetails = OrderDetails::with(['Order'])->where('id', $id)->get();
        return response($client_orderDetails);
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
        //TODO validation
        $validator = Validator::make($request->all(), [
          
            'drug_image' => 'required',
       
            'details' => 'required',
            'order_id' => 'required'
        ]);

        OrderDetails::where('id', $id)
            ->update([
    
                'drug_image' => $request->input('drug_image'),
       
                'details' => $request->input('details'),
                'order_id' => $request->input('order_id')

            ]);

        return response(['added successfully', $validator->errors()]);
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
    }
}
