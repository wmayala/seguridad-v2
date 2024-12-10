<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Cropper extends Component
{
    public $existingPhoto;
    
    public function render()
    {
        return view('livewire.layout.cropper');
    }
}
