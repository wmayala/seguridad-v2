<?php

namespace App\Livewire\Users;

use App\Models\User;
use Bouncer;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $id, $name, $email, $status;
    public $roles;
    public $rolSeleccionados = [];

    protected $rules = [
        'status' => 'boolean',
    ];

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->status = $user->status;

        $this->roles = Bouncer::role()->all();
        $this->rolSeleccionados = DB::table('assigned_roles')->where('entity_id', $this->id)->pluck('role_id')->toArray();
    }

    public function update()
    {
        $this->validate();
        $user = User::findOrFail($this->id);

        if ($this->rolSeleccionados == []) {
            session()->flash('danger', 'Debe seleccionar al menos 1 rol.');
            return redirect()->route('users.edit', $this->id);

        } else {
            Bouncer::useUserModel(User::class);

            foreach ($this->rolSeleccionados as $rol) {
                Bouncer::assign($rol)->to($user->id);
            }
           
            $user->update(['status' => $this->status]);
    
            session()->flash('success', 'Usuario actualizado exitosamente!');
    
            return redirect()->route('users.index');
        }
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
