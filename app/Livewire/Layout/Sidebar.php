<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Sidebar extends Component
{
    public $sections = [
        [
            'title' => 'CONTROLES',
            'options' => [
                ['label'=>'Personal Actividad','route'=>'staff.index'],
                ['label'=>'Jubilados','route'=>'retired.index'],
                ['label'=>'Personal S. F.','route'=>'sfstaff.index'],
                ['label'=>'Personal Empresas','route'=>'cstaff.index'],
                ['label'=>'Vehículos S. F.','route'=>'vehicles.index'],
                ['label'=>'Beneficiarios','route'=>'beneficiaries.index'],
                ['label'=>'Firmas Autorizadas','route'=>'signatures.index'],
            ],
        ],
        [
            'title' => 'MANTENIMIENTO',
            'options' => [
                ['label'=>'Actividades','route'=>'activities.index'],
                ['label'=>'Instituciones S. F.','route'=>'institutions.index'],
                ['label'=>'Empresas','route'=>'companies.index'],
            ],
        ],
        [
            'title' => 'CONSULTAS',
            'options' => [
                ['label'=>'Buscar usuarios','route'=>'home'],
            ],
        ],
        [
            'title' => 'USUARIOS',
            'options' => [
                ['label'=>'Usuarios','route'=>'users.index'],
                ['label'=>'Roles','route'=>'roles.index'],
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
