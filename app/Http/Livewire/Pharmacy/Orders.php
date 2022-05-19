<?php

namespace App\Http\Livewire\Pharmacy;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pharmacy.orders',
        ['orders' => Auth::user()->pharmacyOrders()->orderBy('created_at', 'DESC')->paginate(5)]);
    }
}
