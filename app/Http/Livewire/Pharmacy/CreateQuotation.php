<?php

namespace App\Http\Livewire\Pharmacy;

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
      $this->validateOnly($propertyName,QuotationDetails::roles(), QuotationDetails::messages());
    }


    public function storeQuotation()
    {
        $this->validate(QuotationDetails::roles(), QuotationDetails::messages());

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

        // send and save notification in DB
        $user  = User::find($this->order->user_id);
        $data  = [
          'pharmacy' => Auth::user(),
          'order'    => $this->order,
          'message'  => 'تم إرسال عرض سعر يُمكنك الإطلاع عليها'
        ];

        Notification::send($user, new UserOrderNotification($data));

        $this->resetInputFields();

        session()->flash('status', 'لقد تم إرسال عرض السعر');

    }

    public function add($i)
    {
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
