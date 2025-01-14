<?php

namespace App\Livewire\Activities;

use Livewire\Component;
use App\Models\Activity;

class Index extends Component
{
    public $activities;
    public $search='';

    public function mount()
    {
        $this->activities=Activity::all();
    }

    public function updatedSearch()
    {
        $this->activities=Activity::where('name','like','%'.$this->search.'%')->get();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function render()
    {
        return view('livewire.activities.index');
    }

    public function delete($id)
    {
        Activity::findOrFail($id)->delete();
        $this->mount();
    }
}
