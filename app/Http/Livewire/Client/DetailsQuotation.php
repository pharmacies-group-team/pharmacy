<?php

namespace App\Http\Livewire\Client;

use App\Enum\OrderEnum;
use App\Models\{Invoice, Quotation, QuotationDetails, Address};
use App\Services\{OrderServices, PaymentServices};
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailsQuotation extends Component
{
  public $quotationDetails, $quotation, $quotationID;
  public $quantity, $addressID, $addresses;
  public $name, $phone, $type_address, $desc;

  public $active = 0;

  public function render()
  {
    $this->quotationDetails = QuotationDetails::where('quotation_id', $this->quotationID)->get();
    $this->quotation        = Quotation::find($this->quotationID);
    $this->addresses        = Auth::user()->addresses()->get();

    $invoice       = Invoice::where('order_id', $this->quotation->order->id)->select('is_active')->first();
    $this->active = $invoice == '' ? 0 : $invoice->is_active;

    if ($this->quotation->order->status === OrderEnum::UNPAID_ORDER)
      return view('livewire.client.details-quotation');
    else
      return view('client.orders');
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName, Address::roles(), Address::messages());
  }

  //********* Delete From Quotation Details *********//
  public function delete($id)
  {
    $quotationDetails = QuotationDetails::find($id);
    $this->quotation->update(['total' => abs($quotationDetails->total - $this->quotation->total)]);
    $quotationDetails->delete();
    session()->flash('message', 'تم حذف المنتح من عرض المنتج.');
  }

  //********* Payment *********//
  public function pay()
  {
    if ($this->quotationDetails->count() === 0)
      session()->flash('message', 'عذراً ولكن لا يوجد منتجات لإكمال عملية الدفع.');

    elseif ($this->addressID == '')
      session()->flash('message', 'من فضلك قم بتحديد موقع التوصيل.');

    else {
      $amount = $this->quotation->total;

      if (Auth::user()->balance >= $amount && $this->quotation->order->status === OrderEnum::UNPAID_ORDER)
        return PaymentServices::paymentFromWallet($amount, $this->quotation, $this->addressID);

      elseif ($this->quotation->order->status === OrderEnum::UNPAID_ORDER)
        return PaymentServices::paymentFromAPI($this->quotation, $this->quotationID, $this->addressID);

      else
        session()->flash('message', 'يبدو أن هناك خطأ.');
    }
  }

  //********* Create Address *********//
  public function store()
  {
    Address::create(
      [
        'name' => $this->name,
        'phone' => $this->phone,
        'desc' => $this->desc,
        'type_address' => $this->type_address,
        'user_id' => Auth::id()
      ]
    );

    $this->resetFiled();
    session()->flash('message', 'تم إضافة عنوان جديد.');
  }

  //********* Cancel Order *********//
  public function cancelOrder()
  {
    OrderServices::cancelOrder($this->quotation->order->id);
  }

  //********* reset filed inputs *********//
  public function resetFiled()
  {
    $this->name         = '';
    $this->phone        = '';
    $this->desc         = '';
    $this->type_address = '';
  }
}
