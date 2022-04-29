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
      $this->pharmacies = Pharmacy::all();
        return view('livewire.search');
    }
}
