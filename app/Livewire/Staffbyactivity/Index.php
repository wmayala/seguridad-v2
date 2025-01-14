<?php

namespace App\Livewire\Staffbyactivity;

use App\Models\StaffByActivity;
use Livewire\Component;

class Index extends Component
{
    public $staff;
    public $search='';

    public function mount()
    {
        $this->staff=StaffByActivity::where('status', 1)->get();
    }

    public function viewAll()
    {
        $this->staff=StaffByActivity::all();
    }

    public function updatedSearch()
    {
        $this->staff=StaffByActivity::where('name','like','%'.$this->search.'%')->get();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        StaffByActivity::findOrFail($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.staffbyactivity.index');
    }
}
