<?php

namespace App\Livewire\Institutions;

use App\Models\Institution;
use Livewire\Component;

class Create extends Component
{
    public $name, $status;

    protected $rules=[
        'name'=>'required|string|max:255',
        'status'=>'boolean',
    ];

    public function create()
    {
        $this->validate();

        Institution::create([
            'name'=>$this->name,
            'status'=>$this->status,
        ]);

        session()->flash('success','Institución creada exitosamente!');
        return redirect()->route('institutions.index');
    }

    public function render()
    {
        return view('livewire.institutions.create');
    }
}
