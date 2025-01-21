<?php

namespace App\Livewire\Beneficiary;

use App\Models\Beneficiary;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $id, $record, $name, $age, $relationship, $empCode, $empName, $institution, $expirationDate, $issueDate, $photo, $existingPhoto, $signature, $existingSign, $status;

    // VALIDACIONES
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

    // CARGA DE TODA LA INFORMACIÓN DEL BENEFICIARIO
    public function mount($id)
    {
        $beneficiary=Beneficiary::findOrFail($id);
        $this->id=$beneficiary->id;
        $this->record=$beneficiary->record;
        $this->name=$beneficiary->name;
        $this->age=$beneficiary->age;
        $this->relationship=$beneficiary->relationship;
        $this->empCode=$beneficiary->empCode;
        $this->empName=$beneficiary->empName;
        $this->institution=$beneficiary->institution;
        $this->expirationDate=$beneficiary->expirationDate;
        $this->issueDate=$beneficiary->issueDate;
        $this->existingPhoto=$beneficiary->photo;
        $this->existingSign=$beneficiary->signature;
        $this->status=$beneficiary->status;
    }

    // ACTUALIZACIÓN DE DATOS SI LOS HUBIERE
    public function update()
    {
        $validateData=$this->validate();
        $beneficiary=Beneficiary::findOrFail($this->id);

        // SI LA FOTO O FIRMA EXISTE, LA MANTIENE SINO LA ACTUALIZA
        if($this->photo)
        {
            if($beneficiary->photo && Storage::disk('public')->exists($beneficiary->photo))
            { Storage::disk('public')->delete($beneficiary->photo); }
            $photoPath=$this->photo->store('beneficiaries','public');
            $validateData['photo']=$photoPath;
        }
        else
        { $validateData['photo']=$beneficiary->photo; }

        if($this->signature)
        {
            if($beneficiary->signature && Storage::disk('public')->exists($beneficiary->signature))
            { Storage::disk('public')->delete($beneficiary->signature); }
            $signPath=$this->signature->store('beneficiaries','public');
            $validateData['signature']=$signPath;
        }
        else
        { $validateData['signature']=$beneficiary->signature; }

        $beneficiary->update([
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

        session()->flash('success','Beneficiario actualizado exitosamente!');
        return redirect()->route('beneficiaries.index');
    }

    public function render()
    {
        return view('livewire.beneficiary.edit');
    }
}
