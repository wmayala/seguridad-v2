<?php

namespace App\Livewire\Vehicles;

use App\Models\SFVehicles;
use Livewire\Component;

class Index extends Component
{
    public $vehicles;
    public $search='';

    public function mount()
    {
        $this->vehicles=SFVehicles::where('status', 1)->get();
    }

    public function viewAll()
    {
        $this->vehicles=SFVehicles::all();
    }

    public function updatedSearch()
    {
        $this->vehicles=SFVehicles::where('plate','like','%'.$this->search.'%')->get();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        SFVehicles::findOrFail($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.vehicles.index');
    }
}
