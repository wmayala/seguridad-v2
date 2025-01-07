<?php

namespace App\Livewire\Vehicles;

use App\Models\Institution;
use App\Models\SFVehicles;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $id, $record, $institution_id, $institution_name, $type, $brand, $color, $plate, $issueDate, $expirationDate, $photo, $existingPhoto, $status;

    protected $rules=[
        'record'=>'required|string',
        'institution_id'=>'integer',
        'type'=>'required|string',
        'brand'=>'required|string',
        'color'=>'required|string',
        'plate'=>'required|string',
        'issueDate'=>'required|date',
        'expirationDate'=>'required|date',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'boolean',
    ];

    public function mount($id)
    {
        $vehicle=SFVehicles::findOrFail($id);
        $this->id=$vehicle->id;
        $this->record=$vehicle->record;
        $this->institution_id=$vehicle->institution_id;
        $this->type=$vehicle->type;
        $this->brand=$vehicle->brand;
        $this->color=$vehicle->color;
        $this->plate=$vehicle->plate;
        $this->issueDate=$vehicle->issueDate;
        $this->expirationDate=$vehicle->expirationDate;
        $this->existingPhoto=$vehicle->photo;
        $this->status=$vehicle->status;

        if($this->institution_id)
        { $institution=Institution::findOrFail($this->institution_id); }
        else
        { $institution=Institution::findOrFail(1000); }
        $this->institution_name=$institution->name;

        //vsdfsdfsdf
    }

    public function update()
    {
        $validatedData=$this->validate();

        $vehicle=SFVehicles::findOrFail($this->id);

        if($this->photo)
        {
            if($vehicle->photo && Storage::disk('public')->exists($vehicle->photo))
            {
                Storage::disk('public')->delete($vehicle->photo);
            }
            $photoPath=$this->photo->store('vehicles', 'public');
            $validatedData['photo']=$photoPath;
        }
        else
        {
            $validatedData['photo']=$vehicle->photo;
        }

        $vehicle->update([
            'record'=>$this->record,
            'institution_id'=>$this->institution_id,
            'type'=>$this->type,
            'brand'=>$this->brand,
            'color'=>$this->color,
            'plate'=>$this->plate,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'photo'=>$validatedData['photo'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Vehículo actualizado exitosamente!');

        return redirect()->route('vehicles.index');
    }

    public function render()
    {
        $institutions=Institution::all();
        return view('livewire.vehicles.edit', ['institutions'=>$institutions]);
    }
}
