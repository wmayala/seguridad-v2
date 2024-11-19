<?php

namespace App\Livewire\Activities;

use Livewire\Component;
use App\Models\Activity;

class Index extends Component
{
    public $activities;

    public function mount()
    {
        $this->activities=Activity::all();
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
        $this->activities=Activity::all();
    }
}
