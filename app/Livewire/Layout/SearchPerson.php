<?php

namespace App\Livewire\Layout;

use App\Models\StaffByActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchPerson extends Component
{
    public $searchTerm, $staff;

    public function search()
    {
        $this->validate(['searchTerm'=>'required|string']);

        $staff=StaffByActivity::where('name','like','%'.$this->searchTerm.'%')->get();
    }

    public function render()
    {
        return view('livewire.layout.search-person');
    }
}
