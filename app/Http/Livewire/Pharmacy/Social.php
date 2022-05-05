<?php

namespace App\Http\Livewire\Pharmacy;

use App\Models\Pharmacy;
use App\Models\PharmacySocial;
use Livewire\Component;

class Social extends Component
{
    public $whatsapp;
    public $website;
    public $facebook;
    public $twitter;
    public Pharmacy $pharmacy;

    public function mount()
    {
        $this->facebook = $this->pharmacy->social->facebook;
        $this->twitter  = $this->pharmacy->social->twitter;
        $this->website  = $this->pharmacy->social->website;
        $this->whatsapp = $this->pharmacy->social->whatsapp;
    }

    public function render()
    {
        return view('livewire.pharmacy.social');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, PharmacySocial::roles(), PharmacySocial::messages());
    }

    public function store()
    {
        $this->validate( PharmacySocial::roles(), PharmacySocial::messages());

        $pharmacy = Pharmacy::find($this->pharmacy->id)->first();

        PharmacySocial::updateOrCreate( ['pharmacy_id' => $pharmacy->id],
        [
          'whatsapp'    => $this->whatsapp,
          'website'     => $this->website,
          'twitter'     => $this->twitter,
          'facebook'    => $this->facebook,
        ]);

        session()->flash('message', 'تم تحديث بياناتك بنجاح.');
    }
}
