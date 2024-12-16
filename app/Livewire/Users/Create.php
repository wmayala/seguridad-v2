<?php

namespace App\Livewire\Users;

use App\Ldap\User as LdapUser;
use App\Models\User;
use Bouncer;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $usuario;
    public $unidades;
    public $roles;
    public $rolSeleccionados = [];
    public $datos = array();
    public $correo;
    public $guardar = false;
    public $departamento;
    public $pertenencia;

    public function reiniciar()
    {
        $this->correo = '';
        $this->rolSeleccionados = [];
        $this->usuario = '';
        $this->guardar = false;
    }

    public function getUsuario()
    {
        $this->validate([
            'correo' => 'required|email',
        ]);

        try {
            $user = LdapUser::findByOrFail('mail', $this->correo);

            $this->datos['usuario'] = $user->displayname;
            $this->datos['departamento'] = $user->physicaldeliveryofficename;

            $this->usuario = $this->datos['usuario'][0];
            $this->departamento = $this->datos['departamento'][0];
            $this->guardar = true;

        } catch (\Exception $th) {
            logger('$th', [$th]);
        }
    }

    public function create()
    {
        $this->validate([
            'correo' => 'required|email',
        ]);

        try {
            if ($this->rolSeleccionados == []) {
                session()->flash('danger', 'Debe seleccionar al menos 1 rol.');
                return redirect()->route('users.create');
                
            } else {
                Bouncer::useUserModel(User::class);
                Artisan::call('ldap:import ldap ' . $this->correo . ' --no-interaction');
                $usuario = User::where('email', $this->correo)->first();

                foreach ($this->rolSeleccionados as $rol) {
                    Bouncer::assign($rol)->to($usuario->id);
                }
                $this->reiniciar();

                session()->flash('success', 'Usuario creado exitosamente!');

                return redirect()->route('users.index');
            }

        } catch (\Exception $e) {
            session()->flash('error', 'Ha ocurrido un error al intentar guardar los datos.');
        }
    }

    public function render()
    {
        $this->roles = Bouncer::role()->all();

        return view('livewire.users.create');
    }
}
