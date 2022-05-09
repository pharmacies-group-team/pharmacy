<?php

namespace App\Http\Livewire\Pharmacy;

use App\Enum\OrderEnum;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use App\Models\User;
use App\Notifications\PharmacyOrderNotification;
use App\Notifications\UserOrderNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName, QuotationDetails::roles(), QuotationDetails::messages());
  }


  public function storeQuotation()
  {
    $this->validate(QuotationDetails::roles(), QuotationDetails::messages());

    if ($this->product_name != null) {

      $quotation = Quotation::updateOrCreate(['order_id' => $this->order->id]);

      $total = 0;

      foreach ($this->product_name as $key => $value) {
        QuotationDetails::create(
          [
            'product_name'  => $this->product_name[$key],
            'product_unit'  => $this->product_unit[$key],
            'quantity'      => $this->quantity[$key],
            'price'         => $this->price[$key],
            'total'         => $this->price[$key] * $this->quantity[$key],
            'currency'      => "﷼",
            'quotation_id'  => $quotation->id
          ]
        );

        $total +=  $this->price[$key] * $this->quantity[$key];
      }

      $quotation->update(['total' => $total]);
      $this->order->update(['status' => OrderEnum::UNPAID_ORDER]);
    } else {
      session()->flash('message', 'يرجى إدخال منتج واحد على الأقل.');
    }

    $this->inputs = [];

    // send and save notification in DB
    $user  = User::find($this->order->user_id);
    $data  = [
      'pharmacy' => Auth::user(),
      'order'    => $this->order,
      'message'  => 'تم إرسال عرض سعر يُمكنك الإطلاع عليها'
    ];

    Notification::send($user, new UserOrderNotification($data));


    session()->flash('message', 'لقد تم إرسال عرض السعر');

    $this->reset();

    return redirect()->route('pharmacy.quotation.details', $quotation->id);
  }

  public function add($i)
  {
    $i = $i + 1;
    $this->i = $i;
    array_push($this->inputs, $i);
  }

  public function remove($i)
  {
    unset($this->inputs[$i]);
  }
}
