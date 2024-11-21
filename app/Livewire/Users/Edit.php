<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $id, $name, $email, $status;

    protected $rules=[
        'status'=>'boolean',
    ];

    public function mount($id)
    {
        $user=User::findOrFail($id);
        $this->id=$user->id;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->status=$user->status;
    }

    public function update()
    {
        $this->validate();
        $user=User::findOrFail($this->id);
        $user->update(['status'=>$this->status]);

        session()->flash('success','Usuario actualizado exitosamente!');

        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
