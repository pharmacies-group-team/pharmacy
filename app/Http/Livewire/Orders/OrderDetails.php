<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderDetails extends Component
{
    public $order;

    public function render()
    {
        return view('livewire.orders.order-details', [
            $this->order
        ]);
    }
}
