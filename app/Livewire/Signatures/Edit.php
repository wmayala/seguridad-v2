<?php

namespace App\Livewire\Signatures;

use App\Models\AuthSignatures;
use App\Models\Institution;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $id, $record, $institution_id, $description, $issueDate, $expirationDate, $document, $existingDoc, $status;

    protected $rules=[
        'record'=>'required|string',
        'institution_id'=>'required|integer',
        'description'=>'nullable|string|max:10',
        'issueDate'=>'required|date',
        'expirationDate'=>'required|date',
        'document'=>'nullable|file|max:2048',
        'status'=>'boolean'
    ];

    public function mount($id)
    {
        $signature=AuthSignatures::findOrFail($id);

        $this->id=$signature->id;
        $this->record=$signature->record;
        $this->institution_id=$signature->institution_id;
        $this->description=$signature->description;
        $this->issueDate=$signature->issueDate;
        $this->expirationDate=$signature->expirationDate;
        $this->existingDoc=$signature->document;
        $this->status=$signature->status;
    }

    public function update()
    {
        $validatedData=$this->validate();

        $signature=AuthSignatures::findOrFail($this->id);

        if($this->document)
        {
            if($signature->document && Storage::disk('public')->exists($signature->document))
            { Storage::disk('public')->delete($signature->document); }
            $path=$this->document->store('signatures','public');
            $validatedData['document']=$path;
        }
        else
        { $validatedData['document']=$signature->document; }

        $signature->update([
            'record'=>$this->record,
            'institution_id'=>$this->institution_id,
            'description'=>$this->description,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'document'=>$validatedData['document'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Documento actualizado!');

        return redirect()->route('signatures.index');
    }

    public function render()
    {
        $institutions=Institution::all();
        return view('livewire.signatures.edit', ['institutions'=>$institutions]);
    }
}
