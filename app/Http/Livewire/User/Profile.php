<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Profile extends Component
{
    public $avatar = "";
    public $name = "";
    public $email = "";

    public function mount()
    {
    }

    public function render()
    {
        if (!$this->avatar) {
            $this->avatar = 'default_user.png';
        }

        return view('livewire.user.profile');
    }
}
