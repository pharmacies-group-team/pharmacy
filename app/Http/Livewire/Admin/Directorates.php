<?php

namespace App\Http\Livewire\Admin;

use App\Models\Directorate;
use Livewire\Component;

class Directorates extends Component
{
    public $name;
    public $directorates;
    public $cityID;

    public function render()
    {
      $this->directorates = Directorate::all();
      return view('livewire.admin.directorates');
    }

    public function create()
    {
      $this->resetInputFields();
    }

    public function store()
    {
      Directorate::create(['name'  => $this->name, 'city_id' => $this->cityID]);

      $this->resetInputFields();
      session()->flash('message', 'تم إضافة مديرية جديده.');
    }

    public function update($id)
    {
      $directorate   = Directorate::find($id);
      $this->name    = $directorate->name;
      $this->city_id = $this->cityID;
    }

    public function edit($id)
    {
      $directorate = Directorate::find($id);

      $directorate->update(['name' => $this->name,'city_id' => $this->cityID]);

      $this->resetInputFields();
      session()->flash('message', 'تم التعديل بنجاح.');
    }

    public function delete($id)
    {
      Directorate::find($id)->delete();
      session()->flash('message', 'تم الحذف بنجاح.');
    }

    public function resetInputFields()
    {
      $this->name         = '';
      $this->cityID       = '';
    }
}
