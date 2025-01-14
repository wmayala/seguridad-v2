<?php

namespace App\Livewire\Signatures;

use App\Models\AuthSignatures;
use App\Models\Institution;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $record, $institution_id, $description, $issueDate, $expirationDate, $document, $status;

    protected $rules=[
        'record'=>'required|string',
        'institution_id'=>'required|integer',
        'description'=>'nullable|string|max:10',
        'issueDate'=>'required|date',
        'expirationDate'=>'required|date',
        'document'=>'nullable|file|max:2048',
        'status'=>'boolean'
    ];

    public function create()
    {
        $validateData=$this->validate();

        if($this->document)
        {
            if($this->document && Storage::disk('public')->exists($this->document))
            { Storage::disk('public')->delete($this->document); }
            $docPath=$this->document->store('signatures','public');
            $validateData['document']=$docPath;
        }
        else
        { $validateData['document']=$this->document; }

        AuthSignatures::create([
            'record'=>$this->record,
            'institution_id'=>$this->institution_id,
            'description'=>$this->description,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'document'=>$validateData['document'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Documento agregado!');
        return redirect()->route('signatures.index');
    }

    public function render()
    {
        $institutions=Institution::all();
        return view('livewire.signatures.create',['institutions'=>$institutions]);
    }
}
