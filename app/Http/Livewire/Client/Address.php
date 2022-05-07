<?php

namespace App\Http\Livewire\Client;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Address as Addresses;

class Address extends Component
{
    public $name, $phone, $type_address, $desc;
    public $addresses;

    public function render()
    {
        $this->addresses = Addresses::all();
        return view('livewire.client.address');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, Addresses::roles(), Addresses::messages());
    }

    public function store()
    {
        Addresses::create(
          [
            'name'         => $this->name,
            'phone'        => $this->phone,
            'desc'         => $this->desc,
            'type_address' => $this->type_address,
            'user_id'      => Auth::id()
          ]
        );

        $this->resetInputFields();
        session()->flash('message', 'تم إضافة عنوان جديد.');
    }

    public function resetInputFields()
    {
        $this->name         = '';
        $this->phone        = '';
        $this->type_address = '';
        $this->desc         = '';
    }
}
