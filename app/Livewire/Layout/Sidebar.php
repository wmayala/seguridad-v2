<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Sidebar extends Component
{
    public $sections = [
        [
            'title' => 'CONTROLES',
            'options' => [
                ['label'=>'Personal por actividad','route'=>'home'],
                ['label'=>'Jubilados','route'=>'home'],
                ['label'=>'Personal S. F.','route'=>'home'],
                ['label'=>'Personal Empresas','route'=>'home'],
                ['label'=>'Vehículos S. F.','route'=>'home'],
                ['label'=>'Beneficiarios','route'=>'home'],
                ['label'=>'Firmas Autorizadas','route'=>'home'],
            ],
        ],
        [
            'title' => 'MANTENIMIENTO',
            'options' => [
                ['label'=>'Actividades','route'=>'activities.index'],
                ['label'=>'Instituciones S. F.','route'=>'institutions.index'],
                ['label'=>'Empresas','route'=>'companies.index'],
                ['label'=>'Tipo de Documentos','route'=>'home'],
                ['label'=>'Tipo de Armamento','route'=>'home'],
            ],
        ],
        [
            'title' => 'USUARIOS',
            'options' => [
                ['label'=>'Usuarios','route'=>'users.index'],
                ['label'=>'Roles','route'=>'home'],
            ],
        ],
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
