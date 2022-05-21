<?php

namespace App\Http\Livewire\Admin;

use App\Enum\RoleEnum;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UsersManagement extends Component
{
    use WithPagination;

    public $role;

    public $name, $email, $phone, $avatar,$password, $roles, $confirm_password;

    public function mount()
    {
      $this->roles = RoleEnum::SUPER_ADMIN;
    }

    public function render()
    {
        return view('livewire.admin.users-management',
        ['users' => $this->filter()]);
    }

    //********* filter search orders *********//
    public function filter()
    {
      ##### Search By user roles #####
      if($this->role != '')
        return User::Role($this->role)->orderBy('created_at')->paginate(5);

      else
        return User::orderBy('created_at')->paginate(5);
    }

    //********* Resetting Pagination After Filtering Data *********//
    public function updatedRole()
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

    public function updated($propertyName)
    {
      $this->validateOnly($propertyName,  [
        'name'             => ['required', 'string', 'max:255', 'min:5'],
        'email'            => ['required', 'string', 'email', 'max:255', 'unique:users,email,'],
        'phone'            => 'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:8|max:9|starts_with:77,73,71,70,0',
        'password'         => ['required', 'string', 'min:8'],
        'confirm_password' => 'required|same:password',

      ], User::messages());
    }

    //********* create new user *********//
    public function store()
    {
      $this->validate( [
        'name'             => ['required', 'string', 'max:255', 'min:5'],
        'email'            => ['required', 'string', 'email', 'max:255', 'unique:users,email,'],
        'phone'            => 'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:8|max:9|starts_with:77,73,71,70,0',
        'password'         => ['required', 'string', 'min:8'],
        'confirm_password' => 'required|same:password',
      ], User::messages());

      User::create(
      [
        'name'     => $this->name,
        'email'    => $this->email,
        'phone'    => $this->phone,
        'password' => $this->password
      ])->assignRole($this->roles);

      $this->reset();

      session()->flash('status', 'تم إنشاء مستخدم جديد.');
    }

    //********* active users *********//
    public function toggle($id)
    {
      User::find($id)->update(['is_active' => !User::find($id)->is_active]);

      session()->flash('status', 'تمت العملية بنجاح.');
    }
}
