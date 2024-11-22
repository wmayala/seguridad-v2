<?php

namespace App\Livewire\Retired;

use App\Models\Retired;
use Livewire\Component;

class Index extends Component
{
    public $retired;

    public function mount()
    {
        $this->retired=Retired::all();
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
