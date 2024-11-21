<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $users;

    public function mount()
    {
        $this->users=User::all();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        $this->users=User::all();
    }

    public function render()
    {
        return view('livewire.users.index');
    }
}
