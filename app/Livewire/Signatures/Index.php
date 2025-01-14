<?php

namespace App\Livewire\Signatures;

use App\Models\AuthSignatures;
use App\Models\Institution;
use Livewire\Component;

class Index extends Component
{
    public $signatures, $institutions;

    public function mount()
    {
        $this->signatures=AuthSignatures::where('status', 1)->get();
        $this->institutions=Institution::all();
    }

    public function viewAll()
    {
        $this->signatures=AuthSignatures::all();
        $this->institutions=Institution::all();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        AuthSignatures::findOrFail($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.signatures.index');
    }
}
