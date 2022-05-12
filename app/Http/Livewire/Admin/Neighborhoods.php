<?php

namespace App\Http\Livewire\Admin;

use App\Models\Neighborhood;
use Livewire\Component;

class Neighborhoods extends Component
{
    public $name;
    public $neighborhoods;
    public $directorateID;

    public function render()
    {
      $this->neighborhoods = Neighborhood::all();
      return view('livewire.admin.neighborhoods');
    }

    public function create()
    {
      $this->resetInputFields();
    }

    public function store()
    {
      Neighborhood::create(['name'  => $this->name, 'directorate_id' => $this->directorateID]);

      $this->resetInputFields();
      session()->flash('message', 'تم إضافة حي جديده.');
    }

    public function update($id)
    {
      $neighborhood         = Neighborhood::find($id);
      $this->name           = $neighborhood->name;
      $this->directorate_id = $neighborhood->directorateID;
    }

    public function edit($id)
    {
      $neighborhood = Neighborhood::find($id);

      $neighborhood->update(['name' => $this->name,'directorate_id' => $this->directorateID]);

      $this->resetInputFields();
      session()->flash('message', 'تم التعديل بنجاح.');
    }

    public function delete($id)
    {
      Neighborhood::find($id)->delete();
      session()->flash('message', 'تم الحذف بنجاح.');
    }

    public function resetInputFields()
    {
      $this->name          = '';
      $this->directorateID = '';
    }
}
