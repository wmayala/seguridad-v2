<?php

namespace App\Livewire\Signatures;

use App\Models\AuthSignatures;
use App\Models\Institution;
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
        'document'=>'required|file|max:2048',
        'status'=>'boolean'
    ];

    public function create()
    {
        $this->validate();

        $path=$this->document->store('signatures', 'public');


        AuthSignatures::create([
            'record'=>$this->record,
            'institution_id'=>$this->institution_id,
            'description'=>$this->description,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'document'=>$path,
            'status'=>$this->status,
        ]);

        /// recuperar el nombre a partir del id de la institución

        session()->flash('success','Documento agregado!');

        return redirect()->route('signatures.index');
    }

    public function render()
    {
        $institutions=Institution::all();
        return view('livewire.signatures.create',['institutions'=>$institutions]);
    }
}
