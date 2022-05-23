<?php

namespace App\Http\Livewire\Pharmacy;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public $status;

    public function render()
    {
        return view('livewire.pharmacy.orders',
        ['orders' => $this->filter()]);
    }

    //********* filter search orders *********//
    public function filter()
    {
      ##### Search By order status #####
    if($this->status != '')
        return Auth::user()->pharmacyOrders()->where('status','like', $this->status)
          ->orderBy('created_at', 'DESC')->paginate(5);

    else
      return Auth::user()->pharmacyOrders()->orderBy('created_at', 'DESC')->paginate(5);
    }

    //********* Resetting Pagination After Filtering Data *********//
    public function updatedStatus()
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
