<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\{Directorate, Neighborhood, Pharmacy};
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
        return view('livewire.search', ['pharmacies' => $this->filter()]);
    }

    //********* filter search pharmacies *********//
    public function filter()
    {
        ##### Search By Neighborhood #####
        if ($this->neighborhoodID != '') {
          return Pharmacy::where('neighborhood_id', $this->neighborhoodID)
            ->where('name', 'like', '%'.$this->search.'%')->paginate(12);
        }

        ##### Search By Directorate #####
        elseif ($this->directorateID != '') {
          return Pharmacy::whereIn('neighborhood_id', function ($query) {
                            $query->select('id')-> from('neighborhoods')->
                              where('directorate_id', $this->directorateID);})
            ->where('name', 'like', '%'.$this->search.'%')->paginate(12);
        }

        ##### Search By City #####
        elseif ($this->cityID != '') {
          return Pharmacy::whereIn('neighborhood_id', function ($query){
                            $query->select('id')->from('directorates')->where('city_id', function ($query){
                              $query->select('id')-> from('cities')-> where('id', $this->cityID);
                            });})
                ->where('name', 'like', '%'.$this->search.'%')->paginate(12);
        }

        ##### Search By Name Pharmacy #####
        elseif($this->search != '')
          return Pharmacy::where('name', 'like', '%'.$this->search.'%')->paginate(12);

        else
          return Pharmacy::with(['user'])->paginate(12);
    }

    //********* when update city id *********//
    public function updatedcityID()
    {
      $this->directorateID = '';
      $this->neighborhoodID = '';
      $this->directorates = Directorate::where('city_id', $this->cityID)->orderby('name')->get();
    }

   //********* when update directorate id *********//
    public function updateddirectorateID()
    {
      $this->neighborhoodID = '';
      $this->neighborhoods = Neighborhood::where('directorate_id', $this->directorateID)->orderby('name')->get();
    }

  //********* Resetting Pagination After Filtering Data *********//
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function gotoPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
          return $this->currentPage;
        });
    }
}
