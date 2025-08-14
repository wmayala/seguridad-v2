<?php

namespace App\Livewire\Layout;

use App\Models\Access;
use App\Models\SFStaff;
use Carbon\Carbon;
use Livewire\Component;

class AccessControl extends Component
{
    public $result=[];
    public $query='';
    public $sfstaff_id;
    public $start_at;
    public $end_at;

    public function verifyAccess()
    {
        $this->validate([
            'query' => 'required',
        ], [
            'query.required' => 'Debe agregar una consulta válida.',
        ]);

        $this->result=SFStaff::where('dui', $this->query)
            ->where('zone', 1)
            ->where('status', 1)
            ->first();
        $this->query='';
    }

    public function confirmAccess()
    {
        if($this->result)
        {
            Access::create([
                'sfstaff_id' => $this->result->dui,
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
