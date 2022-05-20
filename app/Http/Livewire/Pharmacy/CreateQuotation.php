<?php

namespace App\Http\Livewire\Pharmacy;

use App\Enum\{OrderEnum, QuotationEnum};
use App\Models\{Quotation, QuotationDetails};
use App\Services\NotificationService;
use Livewire\Component;
use Throwable;

class CreateQuotation extends Component
{
  public $product_name, $product_unit, $quantity, $price;
  public $total, $currency, $order;
  public $inputs = [];
  public $i = 1;

  public function mount()
  {
    $this->product_unit = QuotationEnum::TYPE_BOTTLE;
    $this->quantity = 1;
  }

  public function render()
  {
    return view('livewire.pharmacy.create-quotation');
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName, QuotationDetails::roles(), QuotationDetails::messages());
  }

  //********* save products in quotation details *********//
  public function storeQuotation()
  {
    ##### check if not empty data #####
    if (empty($this->quantity) || empty($this->product_name) || empty($this->product_unit) || empty($this->price)) {
      session()->flash('message', 'يرجى إدخال منتج واحد على الأقل.');
    }

    ##### check and save data #####
    elseif ($this->product_name != null)
    {
      $this->validate(QuotationDetails::roles(), QuotationDetails::messages());
      $quotation = Quotation::updateOrCreate(['order_id' => $this->order->id]);

      $total = 0;

      foreach ($this->product_name as $key => $value) {
        QuotationDetails::create(
          [
            'product_name'  => $this->product_name[$key],
            'product_unit'  => $this->product_unit[$key],
            'quantity'      => (int) $this->quantity[$key],
            'price'         => $this->price[$key],
            'quotation_id'  => $quotation->id
          ]);

        $total +=  $this->price[$key] * $this->quantity[$key];
      }

      $quotation->update(['total' => $total]);
      $this->order->update(['status' => OrderEnum::UNPAID_ORDER]);

      $this->inputs = [];

      try {
        ##### send and save notification in DB #####
        NotificationService::newQuotation($this->order);
      }
      catch (Throwable $e) {
        report($e);
      }

      session()->flash('message', 'لقد تم إرسال عرض السعر');
      $this->reset();
      return redirect()->route('pharmacy.quotation.details', $quotation->id);

    }
  }

  //********* add new form product *********//
  public function add($i)
  {
    $i = $i + 1;
    $this->i = $i;
    array_push($this->inputs, $i);
  }

  //********* remove form product *********//
  public function remove($i)
  {
    unset($this->inputs[$i]);
  }
}
