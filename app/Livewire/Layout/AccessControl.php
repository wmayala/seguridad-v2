<?php

namespace App\Livewire\Layout;

use App\Models\Access;
use App\Models\Beneficiary;
use App\Models\SFStaff;
use App\Models\SFVehicles;
use Livewire\Component;

class AccessControl extends Component
{
    public $result = [];
    public $table;
    public $query = '';
    public $identifier = '';
    public $type;
    public $start_at;
    public $end_at;

    public function verifyAccess()
    {
        $this->validate([
            'query' => 'required',
        ], [
            'query.required' => 'Debe agregar una consulta válida.',
        ]);

        switch (true)
        {
            case $this->query && ($result = SFStaff::where('dui', $this->query)->where('zone', 1)->where('status', 1)->first()):
                $this->result = $result;
                $this->table = 'SFStaff';
                break;

            case $this->query && ($result = SFVehicles::where('plate', $this->query)->where('status', 1)->first()):
                $this->result = $result;
                $this->table = 'SFVehicles';
                break;

            case $this->query && ($result = Beneficiary::where('record', $this->query)->where('status', 1)->first()):



                $this->result = $result;
                $this->table = 'Beneficiary';

                logger('RESULT -> ', [$this->table]);
                break;
        }

        $this->query='';
    }

    public function confirmAccess()
    {
        if($this->result)
        {
            switch($this->table)
            {
                case 'SFStaff':
                    $this->identifier = $this->result->dui;
                    $this->type = 1;
                    break;

                case 'SFVehicles':
                    $this->identifier = $this->result->plate;
                    $this->type = 2;
                    break;

                case 'Beneficiary':
                    $this->identifier = $this->result->record;
                    $this->type = 3;
                    break;
            }

            Access::create([
                'identifier' => $this->identifier,
                'type' => $this->type,
                'start_at' => now(),
                'end_at' => null,
            ]);
        }
        $this->clearInput();
    }

    public function clearInput()
    {
        $this->query='';
        $this->result=[];
        return redirect()->route('access-control');
    }

    public function render()
    {
        return view('livewire.layout.access-control');
    }
}
