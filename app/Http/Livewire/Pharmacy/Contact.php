<?php

namespace App\Http\Livewire\Pharmacy;

use App\Models\Pharmacy;
use App\Models\PharmacyContact;
use Livewire\Component;

class Contact extends Component
{
    public Pharmacy $pharmacy;
    public $contacts;
    public $phone, $contact;

    public function render()
    {
      $this->contacts = PharmacyContact::where('pharmacy_id', $this->pharmacy->id)->orderBy('created_at')->get();
      return view('livewire.pharmacy.contact');
    }

    public function updated($propertyName)
    {
       $this->validateOnly($propertyName, PharmacyContact::roles(), PharmacyContact::messages());
    }

    public function store()
    {
        $this->validate( PharmacyContact::roles(), PharmacyContact::messages());

        PharmacyContact::create(
        [
          'phone' => $this->phone,
          'pharmacy_id' => $this->pharmacy->id
        ]);

        $this->phone = '';
        session()->flash('message', 'تم الإضافة بنجاح.');
    }

    public function update($id)
    {
      PharmacyContact::find($id)->update(['phone' => $this->contact]);
//      $this->reset();
      session()->flash('message', 'تم التعديل بنجاح.');
    }

    public function delete($id)
    {
      PharmacyContact::find($id)->delete();
      session()->flash('message', 'تم الحذف بنجاح.');
    }
}
