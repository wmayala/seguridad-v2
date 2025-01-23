<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{
    public $companies;
    public $search='';

    public function mount()
    {
        $this->companies=Company::where('status', 1)->get();
    }

    public function updatedSearch()
    {
        $this->search?
            $this->companies=Company::where('name','like','%'.$this->search.'%')->get():
            $this->companies=Company::where('status', 1)->get();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        Company::findOrFail($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.companies.index');
    }
}
