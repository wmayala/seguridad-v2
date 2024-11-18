<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Sidebar extends Component
{
    public $sections = [
        [
            'title' => 'CONTROLES',
            'options' => [
                'Personal por actividad',
                'Jubilados',
                'Personal S. F.',
                'Personal Empresas',
                'Vehículos S. F.',
                'Beneficiarios',
                'Firmas Autorizadas',
            ],
        ],
        [
            'title' => 'MANTENIMIENTO',
            'options' => [
                'Actividades',
                'Instituciones S. F.',
                'Empresas',
                'Tipo de Documentos',
                'Tipo de Armamento',
            ],
        ],
        [
            'title' => 'USUARIOS',
            'options' => [
                'Usuarios',
                'Roles',
            ],
        ],
    ];

    public function render()
    {
        return view('livewire.layout.sidebar');
    }
}
