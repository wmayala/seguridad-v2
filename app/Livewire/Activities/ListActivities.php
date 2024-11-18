<?php

namespace App\Livewire\Activities;

use Livewire\Component;
use App\Models\User;

class ListActivities extends Component
{
    public $name;
    public $email;

    public function render()
    {
        $activities=User::all();
        return view('livewire.activities.list-activities', ['activities'=>$activities]);
    }
}
