<?php

namespace App\Livewire\Beneficiary;

use App\Models\Beneficiary;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $record, $name, $age, $relationship, $empCode, $empName, $institution, $expirationDate, $issueDate, $photo, $signature, $status;

    // VALIDACIÓN
    protected $rules=[
        'record'=>'required|string',
        'name'=>'required|string|max:255',
        'age'=>'required|integer',
        'relationship'=>'required|string',
        'empCode'=>'required|integer',
        'empName'=>'required|string',
        'institution'=>'required|string',
        'expirationDate'=>'required|date',
        'issueDate'=>'required|date',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'signature'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'boolean',
    ];

    // FUNCIÓN PARA CREAR UN NUEVO BENEFICIARIO
    public function create()
    {
        // VERIFICA SI LOS DATOS CUMPLEN LA VALIDACIÓN
        $validateData=$this->validate();

        // VALIDA SI EXISTE ALGÚN ARCHIVO DE FOTOGRAFÍA Y FIRMA
        if($this->photo)
        {
            if($this->photo && Storage::disk('public')->exists($this->photo))
            { Storage::disk('public')->delete($this->photo); }
            $photoPath=$this->photo->store('beneficiaries','public');
            $validateData['photo']=$photoPath;
        }
        else
        { $validateData['photo']=$this->photo; }

        if($this->signature)
        {
            if($this->signature && Storage::disk('public')->exists($this->signature))
            { Storage::disk('public')->delete($this->signature); }
            $signPath=$this->signature->store('beneficiaries','public');
            $validateData['signature']=$signPath;
        }
        else
        { $validateData['signature']=$this->signature; }

        Beneficiary::create([
            'record'=>$this->record,
            'name'=>$this->name,
            'age'=>$this->age,
            'relationship'=>$this->relationship,
            'empCode'=>$this->empCode,
            'empName'=>$this->empName,
            'institution'=>$this->institution,
            'expirationDate'=>$this->expirationDate,
            'issueDate'=>$this->issueDate,
            'photo'=>$validateData['photo'],
            'signature'=>$validateData['signature'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Beneficiario agregado exitosamente!');
        return redirect()->route('beneficiaries.index');
    }

    public function render()
    {
        return view('livewire.beneficiary.create');
    }
}
