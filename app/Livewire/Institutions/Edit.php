<?php

namespace App\Livewire\Institutions;

use App\Models\Institution;
use Livewire\Component;

class Edit extends Component
{
    public $id, $name, $status;

    protected $rules=[
        'name'=>'required|string|max:255',
        'status'=>'boolean',
    ];

    public function mount($id)
    {
        $institution=Institution::findOrFail($id);
        $this->id=$institution->id;
        $this->name=$institution->name;
        $this->status=$institution->status;
    }

    public function update()
    {
        $this->validate();
        $institution=Institution::findOrFail($this->id);
        $institution->update([
            'name'=>$this->name,
            'status'=>$this->status,
        ]);

        session()->flash('success','Institución actualizada exitosamente!');

        return redirect()->route('institutions.index');
    }

    public function render()
    {
        return view('livewire.institutions.edit');
    }
}
