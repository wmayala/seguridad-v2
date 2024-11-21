<?php

namespace App\Livewire\Activities;

use Livewire\Component;
use App\Models\Activity;

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

        Activity::create([
            'name'=>$this->name,
            'status'=>$this->status,
        ]);

        session()->flash('success','Actividad creada exitosamente!');

        return redirect()->route('activities.index');
    }

    public function render()
    {
        return view('livewire.activities.create');
    }
}
