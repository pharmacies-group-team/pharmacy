<?php

namespace App\Http\Controllers\Order;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Order;
use App\Models\OrderDetails;

class PharmOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharm_order = OrderDetails::with(['Order'])->get();

        return response($pharm_order);
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
            'drug_name' => 'required',
            'drug_image' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'details' => 'required',
            'order_id' => 'required'
        ]);

        OrderDetails::create([
            'drug_name' => $request->input('drug_name'),
            'drug_image' => $request->input('drug_image'),
            'type' => $request->input('type'),
            'quantity' => $request->input('quantity'),
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
        $pharm_OrderDetails = OrderDetails::with(['Order'])->where('id', $id)->get();
        return response($pharm_OrderDetails);
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
            'drug_name' => 'required',
            'drug_image' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'details' => 'required',
            'order_id' => 'required'
        ]);

        OrderDetails::where('id', $id)
            ->update([
                'drug_name' => $request->input('drug_name'),
                'drug_image' => $request->input('drug_image'),
                'type' => $request->input('type'),
                'quantity' => $request->input('quantity'),
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
