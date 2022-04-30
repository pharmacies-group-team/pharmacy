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
        $searchTerm = '%' .$this->searchTerm. '%';
        $this->pharmacies = Pharmacy::where('name', 'like',$searchTerm)->get();
        return view('livewire.search');
    }
}
