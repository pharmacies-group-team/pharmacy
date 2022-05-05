<?php

namespace App\Http\Livewire\Pharmacy;

use App\Models\Pharmacy;
use App\Models\PharmacyContact;
use Livewire\Component;

class Contact extends Component
{
    public Pharmacy $pharmacy;
    public $contacts;
    public $phone;

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
    }
}
