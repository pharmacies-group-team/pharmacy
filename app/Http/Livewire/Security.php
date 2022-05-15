<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Livewire\Component;

class Security extends Component
{
  public $user;
  public $newPassword;
  public $confirmPassword;
  public $oldPassword;

  protected $rules = [
    'oldPassword'     => ['required', 'min:8'],
    'newPassword'     => ['required', 'min:8'],
    'confirmPassword' => 'same:newPassword'
  ];

  protected $messages = [
    'oldPassword.required'     => 'يرجى إدخال كلمة السر القديمة.',
    'newPassword.required'     => 'يرجى إدخال كلمة السر الجديدة.',
    'confirmPassword.required' => 'يرجى تأكيد كلمة السر الجديدة.',
    'min'                      => 'كلمة السر يجب ألا تقل عن 8 أحرف.',
    'confirmPassword.same'     => 'يجب أن يتطابق مع كلمة السر الجديدة.',
  ];

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
    $this->validateOnly($propertyName);
  }

  public function store()
  {
    $errors = $this->validate();

    # Match Old Password
    if (!Hash::check($this->oldPassword, $this->user->password)) {
      $this->addError('oldPassword', Lang::get('alert.old-password-is-wrong'));
      return;
    }

    #Update new Password
    User::whereId($this->user->id)->update([
      'password' => Hash::make($this->newPassword)
    ]);

    $this->reset();

    session()->flash('message', Lang::get('alert.successfully-change-password'));
  }
}
