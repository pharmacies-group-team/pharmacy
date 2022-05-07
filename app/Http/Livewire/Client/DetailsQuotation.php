<?php

namespace App\Http\Livewire\Client;

use App\Models\Quotation;
use App\Models\QuotationDetails;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailsQuotation extends Component
{
    public $quotationDetails;
    public $quotation;
    public $quotationID;
    public $quantity;
    public $addressID;

    public $addresses;

    protected $roles = ['addressID' => 'required'];

    public function render()
    {
      $this->quotationDetails = QuotationDetails::where('quotation_id', $this->quotationID)->get();
      $this->quotation        = Quotation::find($this->quotationID);

      $this->addresses        = Auth::user()->addresses()->get();

        return view('livewire.client.details-quotation');
    }

    public function edit($id)
    {
      $quotationDetails = QuotationDetails::find($id);

      $this->quotation->update(['total' => abs($quotationDetails->total - $this->quotation->total)]);

      $newTotal = $this->quantity * $quotationDetails->price;
        $quotationDetails->update([
        'quantity' => $this->quantity,
        'total'    => $newTotal]);

      $this->quotation->update(['total' => abs($newTotal + $this->quotation->total)]);

      $this->quantity = '';
      session()->flash('message', 'تم تعديل الكمية.');
    }

    public function delete($id)
    {
      $quotationDetails = QuotationDetails::find($id);
      $this->quotation->update(['total' => abs($quotationDetails->total - $this->quotation->total)]);
      $quotationDetails->delete();
      session()->flash('message', 'تم حذف المنتح بنجاح.');
    }

//    public function pay()
//    {
//      if ($this->quotationDetails->count() === 0)
//        session()->flash('message', 'عذراً ولكن لا يوجد منتجات لإكمال عملية الدفع.');
//      else
//        return redirect()->route('client.payment');
//    }
}
