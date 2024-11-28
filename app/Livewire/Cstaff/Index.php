<?php

namespace App\Livewire\Cstaff;

use App\Models\CompaniesStaff;
use Livewire\Component;

class Index extends Component
{
    public $CStaff;

    public function mount()
    {
        $this->CStaff=CompaniesStaff::all();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        CompaniesStaff::findOrFail($id)->delete();
        $this->CStaff=CompaniesStaff::all();
    }

    public function render()
    {
        return view('livewire.cstaff.index');
    }
}
