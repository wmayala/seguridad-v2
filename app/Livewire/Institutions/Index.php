<?php

namespace App\Livewire\Institutions;

use App\Models\Institution;
use Livewire\Component;

class Index extends Component
{
    public $institutions;
    public $search='';

    public function mount()
    {
        $this->institutions=Institution::all();
    }

    public function updatedSearch()
    {
        $this->institutions=Institution::where('name','like','%'.$this->search.'%')->get();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        Institution::findOrFail($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.institutions.index');
    }
}
