<?php

namespace App\Http\Controllers\Bill;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Bill;
use App\Models\BillDetails;

class PharmBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharm_Bill = BillDetails::with(['Bill'])->get();

        return response($pharm_Bill);
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
        // id	drug_name	type	quantity	price	total	bill_id	
        //TODO check validation
        $validator = Validator::make($request->all(), [
            'drug_name' => 'required|min:5|max:100|string',
            'drug_image' => 'required|image|mimes:png,jpg',
            'type' => 'required|min:5|max:10|string',
            'quantity' => 'required|numeric|max:12',
            'price' => 'required|numeric|max:12',
            'total' => 'required|numeric|max:12',
            'Bill_id' => 'required|numeric|max:12',
        ]);

        BillDetails::create([
            'drug_name' => $request->input('drug_name'),
            'drug_image' => $request->input('drug_image'),
            'type' => $request->input('type'),
            'quantity' => $request->input('quantity'),
           	
            ' price' => $request->input(' price'),
            'total' => $request->input('total'),
            'Bill_id' => $request->input('Bill_id')

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
        $pharm_BillDetails = BillDetails::with(['Bill'])->where('id', $id)->get();
        return response($pharm_BillDetails);
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
        //TODO check validation
        $validator = Validator::make($request->all(), [
            'drug_name' => 'required|min:5|max:100|string',
            'drug_image' => 'required|image|mimes:png,jpg',
            'type' => 'required|min:5|max:10|string',
            'quantity' => 'required|numeric|max:12',
            'price' => 'required|numeric|max:12',
            'total' => 'required|numeric|max:12',
            'Bill_id' => 'required|numeric|max:12',
        ]);

        BillDetails::where('id', $id)
            ->update([
                'drug_name' => $request->input('drug_name'),
                'drug_image' => $request->input('drug_image'),
                'type' => $request->input('type'),
                'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'total' => $request->input('total'),
                'Bill_id' => $request->input('Bill_id')

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
