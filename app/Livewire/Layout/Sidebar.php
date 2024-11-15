<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Sidebar extends Component
{
    public $sections = [
        [
            'title' => 'Sección 1',
            'options' => [
                'Opción 1.1',
                'Opción 1.2',
                'Opción 1.3',
            ],
        ],
        [
            'title' => 'Sección 2',
            'options' => [
                'Opción 2.1',
                'Opción 2.2',
                'Opción 2.3',
            ],
        ],
        [
            'title' => 'Sección 3',
            'options' => [
                'Opción 3.1',
                'Opción 3.2',
                'Opción 3.3',
            ],
        ],
    ];

    public function render()
    {
        return view('livewire.layout.sidebar');
    }
}
