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
        $validateData=$this->validate();

        if($this->photo)
        {
            if($this->photo && Storage::disk('public')->exists($this->photo))
            { Storage::disk('public')->delete($this->photo); }
            $photoPath=$this->photo->store('sfstaff','public');
            $validateData['photo']=$photoPath;
        }
        else
        { $validateData['photo']=$this->photo; }

        if($this->signature)
        {
            if($this->signature && Storage::disk('public')->exists($this->signature))
            { Storage::disk('public')->delete($this->signature); }
            $signPath=$this->signature->store('sfstaff','public');
            $validateData['signature']=$signPath;
        }
        else
        { $validateData['signature']=$this->signature; }

        if($this->document)
        {
            if($this->document && Storage::disk('public')->exists($this->document))
            { Storage::disk('public')->delete($this->document); }
            $docPath=$this->document->store('sfstaff','public');
            $validateData['document']=$docPath;
        }
        else
        { $validateData['document']=$this->document; }

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
            'photo'=>$validateData['photo'],
            'signature'=>$validateData['signature'],
            'document'=>$validateData['document'],
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
