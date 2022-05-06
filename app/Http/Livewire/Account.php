<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Account extends Component
{
    public $user;
    public $name;
    public $email;

    public function mount()
    {
        $this->user  = Auth::user();
        $this->name  = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.account');
    }

    public function updated($propertyName)
    {
      $this->validateOnly($propertyName, User::role(), User::messages());
    }

    public function store()
    {
      $this->validate( User::role(), User::messages());

      $this->user->update(
        [
          'name' => $this->name,
          'email' => $this->email
        ]);

      session()->flash('message', 'تم تحديث بياناتك بنجاح.');
    }
}
