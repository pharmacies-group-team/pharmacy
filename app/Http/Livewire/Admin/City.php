<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class City extends Component
{
    public $name;
    public $cities;

    public function render()
    {
      $this->cities  = City::all();
      return view('livewire.admin.city');
    }

    public function create()
    {
      $this->resetInputFields();
    }

    public function store()
    {
      \App\Models\City::create(['name'  => $this->name,]);

      $this->resetInputFields();
      session()->flash('message', 'تم إضافة مدينه جديد.');
    }

    public function update($id)
    {
      $city        = \App\Models\City::find($id);
      $this->name  = $city->name;
    }

    public function edit($id)
    {
      $city = \App\Models\City::findOrFail($id);

      $city->update(['name' => $this->name,]);

      $this->resetInputFields();
      session()->flash('message', 'تم التعديل بنجاح.');
    }

    public function delete($id)
    {
      \App\Models\City::find($id)->delete();
      session()->flash('message', 'تم الحذف بنجاح.');
    }

    public function resetInputFields()
    {
      $this->name         = '';
    }
}
