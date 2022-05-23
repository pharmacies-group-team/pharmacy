<?php

namespace App\Http\Livewire\Client;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Address as Addresses;

class Address extends Component
{
    public $name, $phone, $type_address, $desc;
    public $addresses, $address_id;

    public function render()
    {

        $this->addresses  = Auth::user()->addresses()->get();
        return view('livewire.client.address');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, Addresses::roles(), Addresses::messages());
    }

    public function create()
    {
      $this->resetInputFields();
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

    public function update($id)
    {
      $address            = Addresses::find($id);
      $this->name         = $address->name;
      $this->phone        = $address->phone;
      $this->type_address = $address->type_address;
      $this->desc         = $address->desc;
    }

    public function edit($id)
    {
      $address = Addresses::findOrFail($id);

      $address->update([
        'name'         => $this->name,
        'phone'        => $this->phone,
        'desc'         => $this->desc,
        'type_address' => $this->type_address,
      ]);

      $this->resetInputFields();
      session()->flash('message', 'تم التعديل بنجاح.');
    }

    public function delete($id)
    {
      Addresses::find($id)->delete();
      session()->flash('message', 'تم الحذف بنجاح.');
    }

    public function resetInputFields()
    {
        $this->name         = '';
        $this->phone        = '';
        $this->type_address = '';
        $this->desc         = '';
    }
}
