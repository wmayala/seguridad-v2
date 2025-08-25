<?php

namespace App\Livewire\Sfstaff;

use App\Models\Institution;
use App\Models\SFStaff;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $record, $zone, $name, $position, $dui, $duiPlace, $duiDate, $address, $birthPlace, $birthDate, $institution_id, $issueDate, $expirationDate, $photo, $signature, $document, $status;

    protected $rules=[
        'record'=>'required|string',
        'zone'=>'required|integer',
        'name'=>'required|string|max:255',
        'position'=>'required|string',
        'dui'=>'required|string|max:10',
        'duiPlace'=>'required|string',
        'duiDate'=>'required|date',
        'address'=>'required|string',
        'birthPlace'=>'required|string',
        'birthDate'=>'required|date',
        'institution_id'=>'required',
        'issueDate'=>'required|date',
        'expirationDate'=>'required|date',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'signature'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'document'=>'nullable|file|max:2048',
        'status'=>'boolean',
    ];

    public function create()
    {
        $validatedData=$this->validate();

        if($this->photo)
        {
            $photoPath=$this->photo->store('sfstaff','s3');
            Storage::disk('s3')->setVisibility($photoPath, 'public');
            $validatedData['photo']=$photoPath;
        }
        else
        {
            $validatedData['photo']=null;
        }

        if($this->signature)
        {
            $signPath=$this->signature->store('sfstaff','s3');
            Storage::disk('s3')->setVisibility($signPath, 'public');
            $validatedData['signature']=$signPath;
        }
        else
        {
            $validatedData['signature']=null;
        }

        if($this->document)
        {
            $docName = $this->document->getClientOriginalName();
            $docPath = "sfstaff/{$docName}";
            Storage::disk('s3')->putFileAs('sfstaff', $this->document, $docName, 'public');
            $validatedData['document']=$docPath;
        }
        else
        {
            $validatedData['document']=null;
        }

        SFStaff::create([
            'record'=>$this->record,
            'zone'=>$this->zone,
            'name'=>$this->name,
            'position'=>$this->position,
            'dui'=>$this->dui,
            'duiPlace'=>$this->duiPlace,
            'duiDate'=>$this->duiDate,
            'address'=>$this->address,
            'birthPlace'=>$this->birthPlace,
            'birthDate'=>$this->birthDate,
            'institution_id'=>$this->institution_id,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'photo'=>$validatedData['photo'],
            'signature'=>$validatedData['signature'],
            'document'=>$validatedData['document'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Personal SF agregado exitosamente!');
        return redirect()->route('sfstaff.index');
    }

    public function render()
    {
        $institutions=Institution::all();
        return view('livewire.sfstaff.create', ['institutions'=>$institutions]);
    }
}
