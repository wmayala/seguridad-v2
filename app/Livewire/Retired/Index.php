<?php

namespace App\Livewire\Retired;

use App\Models\Retired;
use Livewire\Component;

class Index extends Component
{
    public $retired;
    public $showInactive=1;
    public $search='';

    public function mount()
    {
        $this->retired=$this->showInactive
            ? Retired::where('status',1)->get()
            : Retired::all();
    }

    public function updatedSearch()
    {
        $this->retired=Retired::where('name','like','%'.$this->search.'%')->get();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        Retired::findOrFail($id)->delete();
        $this->retired=Retired::all();
    }

    public function render()
    {


        return view('livewire.retired.index');
    }
}
