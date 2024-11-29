<?php

namespace App\Livewire\Signatures;

use App\Models\AuthSignatures;
use Livewire\Component;

class Index extends Component
{
    public $signatures;

    public function mount()
    {
        $this->signatures=AuthSignatures::all();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        AuthSignatures::findOrFail($id)->delete();
        $this->signatures=AuthSignatures::all();
    }

    public function render()
    {
        return view('livewire.signatures.index');
    }
}
