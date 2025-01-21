<?php

namespace App\Livewire\Activities;

use App\Models\Activity;
use Livewire\Component;

class Edit extends Component
{
    public $id, $name, $status;

    // VALIDACIONES
    protected $rules=[
        'name'=>'required|string|max:255',
        'status'=>'boolean',
    ];

    // FUNCIÓN PARA INICIALIZAR VALORES EN EL FORMULARIO DESDE LA BD
    public function mount($id)
    {
        $activity=Activity::findOrFail($id);
        $this->id=$activity->id;
        $this->name=$activity->name;
        $this->status=$activity->status;
    }

    // FUNCIÓN DE ACTUALIZACIÓN
    public function update()
    {
        $this->validate();

        $activity=Activity::findOrFail($this->id);
        $activity->update([
            'name'=>$this->name,
            'status'=>$this->status,
        ]);

        session()->flash('success','Actividad actualizada exitosamente!');
        return redirect()->route('activities.index');
    }

    public function render()
    {
        return view('livewire.activities.edit');
    }
}
