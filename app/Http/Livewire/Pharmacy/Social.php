<?php

namespace App\Http\Livewire\Pharmacy;

use App\Models\Pharmacy;
use App\Models\PharmacySocial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Social extends Component
{
    public $whatsapp;
    public $website;
    public $facebook;
    public $twitter;
    public $pharmacy;

    public function mount()
    {
        $this->pharmacy = Pharmacy::where('user_id', Auth::id())->first();

        $this->facebook = isset($this->pharmacy->social) ? $this->pharmacy->social->facebook : '';
        $this->twitter  = isset($this->pharmacy->social) ? $this->pharmacy->social->twitter : '';
        $this->website  = isset($this->pharmacy->social) ? $this->pharmacy->social->website : '';
        $this->whatsapp = isset($this->pharmacy->social) ? $this->pharmacy->social->whatsapp : '';
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

        PharmacySocial::updateOrCreate( ['pharmacy_id' => $this->pharmacy->id],
        [
          'whatsapp'    => $this->whatsapp,
          'website'     => $this->website,
          'twitter'     => $this->twitter,
          'facebook'    => $this->facebook,
        ]);

        session()->flash('message', 'تم تحديث بياناتك بنجاح.');
    }
}
