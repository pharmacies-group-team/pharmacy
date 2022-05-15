<?php

namespace App\Http\Livewire\Pharmacy;

use App\Models\City;
use App\Models\Directorate;
use App\Models\Neighborhood;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Information extends Component
{

    public Pharmacy $pharmacy;
    public $name, $about, $address;

    public $cities, $cityID;
    public $directorates, $directorateID;
    public $neighborhoods, $neighborhoodID;

    public function mount()
    {
        $this->name    = $this->pharmacy->name;
        $this->address = $this->pharmacy->address;
        $this->about   = $this->pharmacy->about;

        $this->cities  = City::orderby('name')->get();

        $this->cityID != '' ?
          $this->directorates = Directorate::where('city_id', $this->cityID)->orderby('name')->get():
          $this->directorates = [];

        $this->directorateID != '' ?
          $this->neighborhoods = Neighborhood::where('directorate_id', $this->directorateID)->orderby('name')->get():
          $this->neighborhoods = [];

    }

    public function render()
    {
        return view('livewire.pharmacy.information');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, Pharmacy::roles(), Pharmacy::messages());
    }

    public function store()
    {
        $this->validate( Pharmacy::roles(), Pharmacy::messages());

        $pharmacy = Pharmacy::where('user_id', Auth::id())->first();

        $pharmacy->update(
          [
            'name' => $this->name,
            'about' => $this->about,
            'address' => $this->address,
          ]);

        session()->flash('message', 'تم تحديث بياناتك بنجاح.');

    }

    public function updatedcityID()
    {
        $this->directorates = Directorate::where('city_id', $this->cityID)
          ->orderby('name')->get();
    }

    public function updateddirectorateID()
    {
        $this->neighborhoods = Neighborhood::where('directorate_id', $this->directorateID)
          ->orderby('name')->get();
    }
}
