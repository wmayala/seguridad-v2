<?php

namespace App\Livewire\Vehicles;

use App\Models\SFVehicles;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showAll = false;
    public $search = '';

    public function viewAll()
    {
        $this->showAll = true;
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        SFVehicles::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        $query = SFVehicles::query();

        if($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if(!$this->showAll) {
            $query->where('status', 1);
        }

        $vehicles = $query->paginate(15);

        return view('livewire.vehicles.index', compact('vehicles'));
    }
}
