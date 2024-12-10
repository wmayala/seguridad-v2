<?php

namespace App\Livewire\Roles;

use App\Http\Services\EncontrarRolPorId;
use Bouncer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RolesPermisos extends Component
{
    use EncontrarRolPorId;

    public $roles;
    public $permisos;
    public $nuevoRol = false;
    public $selectedRol = 0;
    public $permisosSeleccionados = [];

    public function formNuevoRol($estado)
    {
        $this->nuevoRol = $estado;
    }

    public function cambiarRol()
    {
        $this->permisos = Bouncer::ability()->all();

        $encontrarRol = $this->encontrarIdRol($this->selectedRol);
        $this->permisosSeleccionados = DB::table('permissions')->select('ability_id')->where('entity_id', '=', $encontrarRol->id)->pluck('ability_id')->toArray();
    }

    public function create()
    {
        try {
            $encontrarRol = $this->encontrarIdRol($this->selectedRol);

            //Obtener los permisos actuales en base de datos [1,2,3,4,5]
            $permisosGuardados = DB::table('permissions')->select('ability_id')->where('entity_id', '=', $encontrarRol->id)->pluck('ability_id')->toArray();
            //Eliminar los permisos que sean enviados por el request [1,2,3] . Encontrando la diferencia entre arreglo enviado vs arreglo guardado de permisos por rol
            $diferenciaPermisos = array_diff($permisosGuardados, $this->permisosSeleccionados);
            DB::table('permissions')->where('entity_id', '=', $encontrarRol->id)->whereIn('ability_id', array_values($diferenciaPermisos))->delete();

            foreach ($this->permisosSeleccionados as $permiso) {
                Bouncer::allow($this->selectedRol)->to($permiso);
            }

            session()->flash('success', 'Se han asignado los permisos correctamente.');

            return redirect()->route('roles.index');

        } catch (\Exception $e) {
            logger('$e', [$e]);
        }

    }

    public function render()
    {
        $this->roles = Bouncer::role()->all();
        $this->permisos = Bouncer::ability()->all();

        $usuario = Auth::user();
        logger('$usuario', [$usuario]);

        return view('livewire.roles.roles-permisos');
    }
}
