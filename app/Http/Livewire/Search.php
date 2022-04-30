<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pharmacy;
class Search extends Component
{
  public $searchTerm;
  public $pharmacies;
    public function render()
    {
      // $this->pharmacies = Pharmacy::all();
      //   return view('livewire.search');

        $searchTerm = '%' .$this->searchTerm. '%';
        $this->pharmacies = Pharmacy::where('name', 'like',$searchTerm)->get();
        return view('livewire.search');
          //  $request-query('pharmacy');
          // $pharmacy = Pharmacywhere('name','LIKE','%'.$name.'%')-get();
          // return response($pharmacy);

    }
}
