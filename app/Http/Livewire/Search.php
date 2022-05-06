<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Directorate;
use App\Models\Neighborhood;
use App\Models\Pharmacy;
use Livewire\Component;

class Search extends Component
{
    public $pharmacies;

    public $searchQuery;

    public $cities, $cityID;
    public $directorates, $directorateID;
    public $neighborhoods, $neighborhoodID;

    public function mount()
    {
      $this->cities  = City::orderby('name')->get();
      $this->pharmacies = new Pharmacy();

      if ($this->cityID != '') {
        $this->directorates = Directorate::where('city_id', $this->cityID)->orderby('name')->get();
      }
      else {
        $this->directorates = [];
      }

      if ($this->directorateID != '') {
        $this->neighborhoods = Neighborhood::where('directorate_id', $this->directorateID)->orderby('name')->get();
      }
      else {
        $this->neighborhoods = [];
      }
      if ($this->neighborhoodID != '') {
        $this->pharmacies  = Pharmacy::where('neighborhood_id', $this->neighborhoodID)->get();
      }
      else {
        $this->pharmacies = Pharmacy::all();
      }
    }

    public function render()
    {
//      $this->searchQuery != '' ?
//        $this->pharmacies = Pharmacy::where('name', 'like', $this->searchQuery)->get():
//        $this->pharmacies = Pharmacy::all();
      $this->pharmacies = $this->pharmacies;

        return view('livewire.search');
    }

    public function updatedsearchQuery()
    {
      $searchTerm = '%' . 'Dream' . '%';
      $this->pharmacies = Pharmacy::where('name', 'like', $searchTerm)->get();
    }

    public function updatedcityID()
    {
      $this->directorates = Directorate::where('city_id', $this->cityID)
        ->orderby('name')->get();
    }

    public function updatedneighborhoodID()
    {
//      dd($this->neighborhoodID);
      $this->pharmacies  = Pharmacy::where('neighborhood_id', $this->neighborhoodID)->get();
    }


    public function updateddirectorateID()
    {
      $this->neighborhoods = Neighborhood::where('directorate_id', $this->directorateID)
        ->orderby('name')->get();
    }
}
