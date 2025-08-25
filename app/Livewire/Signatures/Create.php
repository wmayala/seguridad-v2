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
        $validatedData=$this->validate();

        if($this->document)
        {
            $docPath=$this->document->store('signatures','s3');
            Storage::disk('s3')->setVisibility($docPath, 'public');
            $validatedData['document']=$docPath;
        }
        else
        {
            $validatedData['document'] = null;
        }

        AuthSignatures::create([
            'record'=>$this->record,
            'institution_id'=>$this->institution_id,
            'description'=>$this->description,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'document'=>$validatedData['document'],
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
