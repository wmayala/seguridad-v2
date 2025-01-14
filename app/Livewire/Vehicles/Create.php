<?php

namespace App\Livewire\Vehicles;

use App\Models\Institution;
use App\Models\SFVehicles;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $record, $institution_id, $type, $brand, $color, $plate, $issueDate, $expirationDate, $photo, $status;

    protected $rules=[
        'record'=>'required|string',
        'institution_id'=>'required',
        'type'=>'required|string',
        'brand'=>'required|string',
        'color'=>'required|string',
        'plate'=>'required|string',
        'issueDate'=>'required|date',
        'expirationDate'=>'required|date',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'boolean',
    ];

    public function create()
    {
        $validateData=$this->validate();

        if($this->photo)
        {
            if($this->photo && Storage::disk('public')->exists($this->photo))
            { Storage::disk('public')->delete($this->photo); }
            $photoPath=$this->photo->store('vehicles','public');
            $validateData['photo']=$photoPath;
        }
        else
        { $validateData['photo']=$this->photo; }

        SFVehicles::create([
            'record'=>$this->record,
            'institution_id'=>$this->institution_id,
            'type'=>$this->type,
            'brand'=>$this->brand,
            'color'=>$this->color,
            'plate'=>$this->plate,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'photo'=>$validateData['photo'],
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
