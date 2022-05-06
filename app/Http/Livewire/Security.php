<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Security extends Component
{
    public $user;
    public $newPassword;
    public $confirmPassword;
    public $oldPassword;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.security');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,
          [
            'oldPassword'     => ['required', 'min:8'],
            'newPassword'     => ['required', 'min:8'],
            'confirmPassword' => 'same:newPassword'
          ],
          [
            'oldPassword.required'     => 'يرجى إدخال كلمة السر القديمة.',
            'newPassword.required'     => 'يرجى إدخال كلمة السر الجديدة.',
            'confirmPassword.required' => 'يرجى تأكيد كلمة السر الجديدة.',
            'min'                      => 'كلمة السر يجب ألا تقل عن 8 أحرف.',
            'confirmPassword.same'     => 'يجب أن يتطابق مع كلمة السر الجديدة.',
          ]);
    }

    public function store()
    {
      $this->validate(
        [
          'oldPassword'     => ['required', 'min:8'],
          'newPassword'     => ['required', 'min:8'],
          'confirmPassword' => 'same:newPassword'
        ],
        [
          'oldPassword.required'     => 'يرجى إدخال كلمة السر القديمة.',
          'newPassword.required'     => 'يرجى إدخال كلمة السر الجديدة.',
          'confirmPassword.required' => 'يرجى تأكيد كلمة السر الجديدة.',
          'min'                      => 'كلمة السر يجب ألا تقل عن 8 أحرف.',
          'confirmPassword.same'     => 'يجب أن يتطابق مع كلمة السر الجديدة.',
        ]);

      #Match The Old Password
      if (!Hash::check($this->oldPassword, $this->user->password)) {
        session()->flash('message', "كلمة السر القديمة غير صحيحة!");
        $this->resetInputFields();
        return;
       }

      #Update the new Password
      User::whereId($this->user->id)->update([
        'password' => Hash::make($this->newPassword)
      ]);
      $this->resetInputFields();
      session()->flash('message', 'تم تغير كلمة السر بنجاح');
    }

    public function resetInputFields()
    {
        $this->oldPassword     = '';
        $this->newPassword     = '';
        $this->confirmPassword = '';
    }
}
