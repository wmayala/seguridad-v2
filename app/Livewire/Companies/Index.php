<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{
    public $companies;

    public function mount()
    {
        $this->companies=Company::all();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        Company::findOrFail($id)->delete();
        $this->companies=Company::all();
    }

    public function render()
    {
        return view('livewire.companies.index');
    }
}
