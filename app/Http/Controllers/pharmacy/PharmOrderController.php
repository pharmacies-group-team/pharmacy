<?php

namespace App\Http\Controllers\Quotation;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Quotation;
use App\Models\QuotationDetails;

class PharmOrderController extends Controller
{
<<<<<<< Updated upstream
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharm_Quotation = QuotationDetails::with(['Quotation'])->get();

        return response($pharm_Quotation);
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
       // 	id	product_name	product_unit	quantity	price	total	currency	quotation_id
        //TODO check validation
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|min:5|max:100|string',
            'product_unit' => 'required|min:5|max:100|string',
            'type' => 'required|min:5|max:10|string',
            'quantity' => 'required|numeric|max:12',
            'price' => 'required|numeric|max:12',
            'total' => 'required|numeric|max:12',
          'currency' => 'required|min:1|max:5|string',
            'Quotation_id' => 'required|numeric|max:12',
        ]);

        QuotationDetails::create([
            'product_name' => $request->input('product_name'),
            'product_unit' => $request->input('product_unit'),
            'type' => $request->input('type'),
            'quantity' => $request->input('quantity'),
           	
            ' price' => $request->input(' price'),
            'total' => $request->input('total'),
             ' price' => $request->input(' price'),
             'currency' => $request->input('currency'),
            'Quotation_id' => $request->input('Quotation_id')

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
        $pharm_QuotationDetails = QuotationDetails::with(['Quotation'])->where('id', $id)->get();
        return response($pharm_QuotationDetails);
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
=======
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pharm_Quotation = QuotationDetails::with(['Quotation'])->get();

    return response($pharm_Quotation);
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
    // 	id	product_name	product_unit	quantity	price	total	currency	quotation_id
    //TODO check validation
    $validator = Validator::make($request->all(), [
      'product_name' => 'required|min:5|max:100|string',
      'product_unit' => 'required|min:5|max:100|string',
      'type' => 'required|min:5|max:10|string',
      'quantity' => 'required|numeric|max:12',
      'price' => 'required|numeric|max:12',
      'total' => 'required|numeric|max:12',
      'currency' => 'required|min:1|max:5|string',
      'Quotation_id' => 'required|numeric|max:12',
    ]);

    QuotationDetails::create([
      'product_name' => $request->input('product_name'),
      'product_unit' => $request->input('product_unit'),
      'type' => $request->input('type'),
      'quantity' => $request->input('quantity'),

      ' price' => $request->input(' price'),
      'total' => $request->input('total'),
      ' price' => $request->input(' price'),
      'currency' => $request->input('currency'),
      'Quotation_id' => $request->input('Quotation_id')

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
    $pharm_QuotationDetails = QuotationDetails::with(['Quotation'])->where('id', $id)->get();
    return response($pharm_QuotationDetails);
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
>>>>>>> Stashed changes
      'product_name' => 'required|min:5|max:100|string',
      'product_unit' => 'required|min:5|max:100|string',
      'type' => 'required|min:5|max:10|string',
      'quantity' => 'required|numeric|max:12',
      'price' => 'required|numeric|max:12',
      'total' => 'required|numeric|max:12',
      'currency' => 'required|min:1|max:5|string',
      'Quotation_id' => 'required|numeric|max:12',
<<<<<<< Updated upstream
        ]);

        QuotationDetails::where('id', $id)
            ->update([
                'product_name' => $request->input('product_name'),
                'product_unit' => $request->input('product_unit'),
                'type' => $request->input('type'),
                'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'total' => $request->input('total'),
      'currency' => $request->input('currency'),
                'Quotation_id' => $request->input('Quotation_id')

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
=======
    ]);

    QuotationDetails::where('id', $id)
      ->update([
        'product_name' => $request->input('product_name'),
        'product_unit' => $request->input('product_unit'),
        'type' => $request->input('type'),
        'quantity' => $request->input('quantity'),
        'price' => $request->input('price'),
        'total' => $request->input('total'),
        'currency' => $request->input('currency'),
        'Quotation_id' => $request->input('Quotation_id')

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
>>>>>>> Stashed changes
}
