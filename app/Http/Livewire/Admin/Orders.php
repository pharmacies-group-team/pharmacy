<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Order;

class Orders extends Component
{
  use WithPagination;

  public $status;
  public function render()
  {
    return view('livewire.admin.orders', ['orders' => $this->filter()]);
  }


  //********* filter search orders *********//
  public function filter()
  {
    ##### Search By order status #####
    if ($this->status != '')

      return Order::select()->where('status', 'like', $this->status)
        ->with('user', 'pharmacy')->orderBy('created_at', 'DESC')->paginate(5);

    else
      return Order::select()->with('user', 'pharmacy')->orderBy('created_at', 'DESC')->paginate(5);
  }

  //********* Resetting Pagination After Filtering Data *********//
  public function updatedStatus()
  {
    $this->resetPage();
  }

  public function gotoPage($url)
  {
    $this->currentPage = explode('page=', $url)[1];
    Paginator::currentPageResolver(function () {
      return $this->currentPage;
    });
  }
}