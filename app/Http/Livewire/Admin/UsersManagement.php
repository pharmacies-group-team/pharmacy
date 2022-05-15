<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersManagement extends Component
{
    use WithPagination;

    public $name, $email, $phone, $avatar,$password, $roles, $confirm_password;

    public function render()
    {
        return view('livewire.admin.users-management',
        ['users' => User::orderBy('created_at')->paginate(10)]);
    }

    public function updated($propertyName)
    {
      $role   = User::roleUser();
      $this->validateOnly($propertyName,  [
        'name'  => ['required', 'string', 'max:255', 'min:5'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'],
        'phone' => 'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:8|max:9|starts_with:77,73,71,70,0',
        'password'  => ['required', 'string', 'min:8', 'confirmed'],
        'confirm_password' => 'required|same:password',
        'avatar'    => 'nullable|image|mimes:jpeg,jpg,png,svg|max:2048',

      ], User::messages());
    }

    public function store()
    {
      $role = User::roleUser();
      $this->validate( [
        'name'  => ['required', 'string', 'max:255', 'min:5'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'],
        'phone' => 'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:8|max:9|starts_with:77,73,71,70,0',
        'password'  => ['required', 'string', 'min:8', 'confirmed'],
        'confirm_password' => 'required|same:password',
        'avatar'    => 'nullable|image|mimes:jpeg,jpg,png,svg|max:2048'
      ], User::messages());

      User::create(
      [
        'name'   => $this->name,
        'email'  => $this->email,
        'phone'  => $this->phone,
        'avatar' => $this->avatar
      ])->assignRole($this->roles);;

      session()->flash('message', 'تم إنشاء مستخدم جديد.');
    }
}
