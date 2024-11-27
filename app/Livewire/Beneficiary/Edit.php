<?php

namespace App\Livewire\Beneficiary;

use App\Models\Beneficiary;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $id, $record, $name, $age, $relationship, $empCode, $empName, $institution, $expirationDate, $issueDate, $photo,$existingPhoto, $status;

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
        'status'=>'boolean',
    ];

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
        $this->status=$beneficiary->status;
    }

    public function update()
    {
        $validateData=$this->validate();

        $beneficiary=Beneficiary::findOrFail($this->id);

        if($this->photo)
        {
            if($beneficiary->photo && Storage::disk('public')->exists($beneficiary->photo))
            {
                Storage::disk('public')->delete($beneficiary->photo);
            }
            $photoPath=$this->photo->store('beneficiaries','public');
            $validateData['photo']=$photoPath;
        }
        else
        {
            $validateData['photo']=$beneficiary->photo;
        }

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
