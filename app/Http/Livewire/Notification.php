<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        return view('livewire.notification',
        ['notifications' => Auth::user()->notifications]);
    }

    public function readable($id)
    {
      $notification = auth()->user()->notifications->find($id);
      $notification->markAsRead();

      return redirect($notification->data['link']);
    }
}
