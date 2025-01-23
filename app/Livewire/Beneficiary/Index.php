<?php

namespace App\Livewire\Beneficiary;

use App\Models\Beneficiary;
use Livewire\Component;

class Index extends Component
{
    public $beneficiaries;
    public $search='';

    // CARGA DE REGISTROS LOS CUALES TENGAN ESTADO ACTIVO
    public function mount()
    {
        $this->beneficiaries=Beneficiary::where('status', 1)->get();
    }

    // FUNCIÓN PARA HABILITAR LA VISTA DE TODOS LOS BENEFICIARIOS ACTIVOS/INACTIVOS
    public function viewAll()
    {
        $this->beneficiaries=Beneficiary::all();
    }

    // BÚSQUEDA POR NOMBRE EN TIEMPO REAL
    public function updatedSearch()
    {
        $this->search?
            $this->beneficiaries=Beneficiary::where('name','like','%'.$this->search.'%')->get():
            $this->beneficiaries=Beneficiary::where('status', 1)->get();
    }

    // REDIRECCIÓN A LA PÁGINA DE EDICIÓN
    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    // ELIMINAR REGISTRO
    public function delete($id)
    {
        Beneficiary::findOrFail($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.beneficiary.index');
    }
}
