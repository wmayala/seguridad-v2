<?php

namespace App\Livewire\Sfstaff;

use App\Models\SFStaff;
use Livewire\Component;

class Index extends Component
{
    public $SFstaff;
    public $search='';

    public function mount()
    {
        $this->SFstaff=SFStaff::where('status', 1)->get();
    }

    public function viewAll()
    {
        $this->SFstaff=SFStaff::all();
    }
    
    public function updatedSearch()
    {
        $this->SFstaff=SFStaff::where('name','like','%'.$this->search.'%')->get();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        SFStaff::findOrFail($id)->delete();
        $this->SFstaff=SFStaff::all();
    }

    public function render()
    {
        return view('livewire.sfstaff.index');
    }
}
