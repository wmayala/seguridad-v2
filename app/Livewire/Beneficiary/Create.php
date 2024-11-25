<?php

namespace App\Livewire\Beneficiary;

use App\Models\Beneficiary;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $record, $name, $age, $relationship, $empCode, $empName, $institution, $expirationDate, $issueDate, $photo, $status;

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
        'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'boolean',
    ];

    public function create()
    {
        $this->validate();

        $photoPath=$this->photo->store('beneficiaries','public');

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
            'photo'=>$photoPath,
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
