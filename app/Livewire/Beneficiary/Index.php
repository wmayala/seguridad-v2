<?php

namespace App\Livewire\Beneficiary;

use App\Models\Beneficiary;
use Livewire\Component;

class Index extends Component
{
    public $beneficiaries;

    public function mount()
    {
        $this->beneficiaries=Beneficiary::all();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        Beneficiary::findOrFail($id)->delete();
        $this->beneficiaries=Beneficiary::all();
    }

    public function render()
    {
        return view('livewire.beneficiary.index');
    }
}
