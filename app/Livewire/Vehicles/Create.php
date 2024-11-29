<?php

namespace App\Livewire\Vehicles;

use App\Models\Institution;
use App\Models\SFVehicles;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $record, $institution_id, $type, $brand, $color, $plate, $issueDate, $expirationDate, $photo, $status;

    protected $rules=[
        'record'=>'required|string',
        'institution_id'=>'integer',
        'type'=>'required|string',
        'brand'=>'required|string',
        'color'=>'required|string',
        'plate'=>'required|string',
        'issueDate'=>'required|date',
        'expirationDate'=>'required|date',
        'photo'=>'nullable|string',
        'status'=>'boolean',
    ];

    public function create()
    {
        $this->validate();

        if($this->photo)
        {
            $photoPath=$this->photo->store('vehicles', 'public');
        }
        else
        {
            $photoPath='';
        }

        SFVehicles::create([
            'record'=>$this->record,
            'institution_id'=>$this->institution_id,
            'type'=>$this->type,
            'brand'=>$this->brand,
            'color'=>$this->color,
            'plate'=>$this->plate,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'photo'=>$photoPath,
            'status'=>$this->status,
        ]);

        session()->flash('success','Vehículo agregado exitosamente!');

        return redirect()->route('vehicles.index');
    }

    public function render()
    {
        $institutions=Institution::all();
        return view('livewire.vehicles.create',['institutions'=>$institutions]);
    }
}
