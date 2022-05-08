<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Directorate;
use App\Models\Neighborhood;
use App\Models\Pharmacy;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $search = '';

    public $cities, $cityID;
    public $directorates, $directorateID;
    public $neighborhoods, $neighborhoodID;

    public $neighborhoodPharmacies;

    public $currentPage = 1;

    public function mount()
    {
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
        return view('livewire.search', [
          'pharmacies' => $this->fillter()
        ]);
    }

    public function fillter()
    {
      if ($this->neighborhoodID != ''){
        return Pharmacy::where('neighborhood_id', $this->neighborhoodID)->paginate(12) ;
      }
      elseif ($this->directorateID != ''){
        Pharmacy::where('name', 'like', '%'.$this->search.'%')->paginate(12);
      }
      else
        return Pharmacy::where('name', 'like', '%'.$this->search.'%')->paginate(12);

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

//    public function updatedneighborhoodID()
//    {
//      $this->neighborhoodPharmacies = $this->neighborhoodID;
//    }

    // Resetting Pagination After Filtering Data
    public function updatedSearch()
    {
      $this->resetPage();
    }
}
