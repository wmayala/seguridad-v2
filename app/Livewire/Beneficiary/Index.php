<?php

namespace App\Livewire\Beneficiary;

use App\Models\Beneficiary;
use Livewire\Component;

class Index extends Component
{
    public $beneficiaries;
    public $search='';

    public function mount()
    {
        $this->beneficiaries=Beneficiary::where('status', 1)->get();
    }

    public function viewAll()
    {
        $this->beneficiaries=Beneficiary::all();
    }

    public function updatedSearch()
    {
        $this->beneficiaries=Beneficiary::where('name','like','%'.$this->search.'%')->get();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

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
