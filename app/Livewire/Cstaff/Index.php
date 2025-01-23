<?php

namespace App\Livewire\Cstaff;

use App\Models\CompaniesStaff;
use Livewire\Component;

class Index extends Component
{
    public $CStaff;
    public $search='';

    public function mount()
    {
        $this->CStaff=CompaniesStaff::where('status', 1)->get();
    }

    public function viewAll()
    {
        $this->CStaff=CompaniesStaff::all();
    }

    public function updatedSearch()
    {
        $this->search?
            $this->CStaff=CompaniesStaff::where('name','like','%'.$this->search.'%')->get():
            $this->CStaff=CompaniesStaff::where('status', 1)->get();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        CompaniesStaff::findOrFail($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.cstaff.index');
    }
}
