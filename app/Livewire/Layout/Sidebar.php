<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Sidebar extends Component
{
    public $sections = [
        [
            'title' => 'CONTROLES',
            'options' => [
                ['label'=>'Personal por actividad','route'=>'activities.index'],
                ['label'=>'Jubilados','route'=>'home'],
                ['label'=>'Personal S. F.','route'=>'home'],
                ['label'=>'Personal Empresas','route'=>'home'],
                ['label'=>'Vehículos S. F.','route'=>'home'],
                ['label'=>'Beneficiarios','route'=>'home'],
                ['label'=>'Firmas Autorizadas','route'=>'home'],
            ],
        ],
        /* [
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
        ], */
    ];

    public function redirectTo($route)
    {
        return redirect($route);
    }

    public function render()
    {
        return view('livewire.layout.sidebar');
    }
}
