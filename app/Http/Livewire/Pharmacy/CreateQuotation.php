<?php

namespace App\Http\Livewire\Pharmacy;

use App\Models\Quotation;
use App\Models\QuotationDetails;
use Livewire\Component;

class CreateQuotation extends Component
{
    public $product_name, $product_unit, $quantity, $price;
    public $total, $currency;
    public $order;
    public $inputs = [];
    public $i = 1;

    public function render()
    {
        return view('livewire.pharmacy.create-quotation');
    }

    protected $rules = [
      'product_name.0' => 'required',
      'product_unit.0' => 'required',
      'quantity.0'     => 'required|numeric',
      'price.0'        => 'required|numeric',
      'currency.0'     => 'currency',
      'product_name.*' => 'required',
      'product_unit.*' => 'required',
      'quantity.*'     => 'required|numeric',
      'price.*'        => 'required|numeric',
      'currency.*'     => 'currency'
    ];

    public function storeQuotation()
    {
        $this->validate($this->rules);
        $quotation = Quotation::updateOrCreate(['order_id' => $this->order->id]);

        foreach ($this->product_name as $key => $value) {
            QuotationDetails::create(
            [
                'product_name'  => $this->product_name[$key],
                'product_unit'  => $this->product_unit[$key],
                'quantity'      => $this->quantity[$key],
                'price'         => $this->price[$key],
                'total'         => $this->price[$key] * $this->quantity[$key],
                'currency'      => $this->currency[$key],
                'quotation_id'  => $quotation->id
            ]);
        }

        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('status', 'لقد تم إرسال عرض السعر');

    }

    public function add($i)
    {
//        $this->total[$i] = $this->price[$i] * $this->quantity[$i];
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields()
    {
        $this->product_name = '';
        $this->product_unit = '';
        $this->currency     = '';
        $this->total        = '';
        $this->quantity     = '';
        $this->price        = '';
    }
}

