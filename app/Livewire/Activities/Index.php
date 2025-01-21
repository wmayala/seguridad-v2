<?php

namespace App\Livewire\Activities;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Activity;

class Index extends Component
{
    use WithPagination;

    public $activities;
    public $search='';

    // CARGA DE DATOS A MOSTRAR FILTRADO POR EL ESTADO (1=ACTIVO)
    public function mount()
    {
        $this->activities=Activity::where('status', 1)->get();
    }

    // FUNCION QUE ACTUALIZA EN TIEMPO REAL LA BÚSQUEDA POR NOMBRE DE ACTIVIDAD */
    public function updatedSearch()
    {
        $this->activities=Activity::where('name','like','%'.$this->search.'%')->get();
    }

    // REDIRECCIÓN A PÁGINA DE EDICIÓN JUNTO CON EL PARÁMETRO DEL ID DEL REGISTRO
    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    // BORRADO DEL REGISTRO
    public function delete($id)
    {
        Activity::findOrFail($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.activities.index');
    }
}
