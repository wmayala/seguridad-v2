<?php

namespace App\Livewire\Sfstaff;

use App\Models\Institution;
use App\Models\SFStaff;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Picqer\Barcode\BarcodeGeneratorPNG;

class Edit extends Component
{
    use WithFileUploads;

    public $id, $record, $zone, $name, $position, $dui, $duiPlace, $duiDate, $address, $birthPlace, $birthDate, $institution_id, $institution_name, $issueDate, $expirationDate, $photo, $existingPhoto, $signature, $existingSign, $document, $existingDoc, $docPath, $status, $bar_code;

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

    public function mount($id)
    {
        $sfstaff=SFStaff::findOrFail($id);
        $this->id=$sfstaff->id;
        $this->record=$sfstaff->record;
        $this->zone=$sfstaff->zone;
        $this->name=$sfstaff->name;
        $this->position=$sfstaff->position;
        $this->dui=$sfstaff->dui;
        $this->duiPlace=$sfstaff->duiPlace;
        $this->duiDate=$sfstaff->duiDate;
        $this->address=$sfstaff->address;
        $this->birthPlace=$sfstaff->birthPlace;
        $this->birthDate=$sfstaff->birthDate;
        $this->institution_id=$sfstaff->institution_id;
        $this->issueDate=$sfstaff->issueDate;
        $this->expirationDate=$sfstaff->expirationDate;
        $this->existingPhoto=$sfstaff->photo;
        $this->existingSign=$sfstaff->signature;
        $this->existingDoc=$sfstaff->document;
        $this->status=$sfstaff->status;

        if($this->institution_id)
        { $institution=Institution::findOrFail($this->institution_id); }
        else
        { $institution=Institution::findOrFail(1000); }
        $this->institution_name=$institution->name;

        $generator=new BarcodeGeneratorPNG();
        $this->bar_code=base64_encode($generator->getBarcode($this->dui, $generator::TYPE_CODE_128));
    }

    public function update()
    {
        $validatedData=$this->validate();
        $sfstaff=SFStaff::findOrFail($this->id);

        if($this->photo)
        {
            $photoPath=$this->photo->store('sfstaff','s3');
            Storage::disk('s3')->setVisibility($photoPath, 'public');
            $validatedData['photo']=$photoPath;
        }
        else
        {
            if($this->id)
            {
                $validatedData['photo'] = SFStaff::find($this->id)->photo;
            }
            else
            {
                $validatedData['photo'] = null;
            }
        }

        if($this->signature)
        {
            $signPath=$this->signature->store('sfstaff','s3');
            Storage::disk('s3')->setVisibility($signPath, 'public');
            $validatedData['signature']=$signPath;
        }
        else
        {
            if($this->id)
            {
                $validatedData['signature'] = SFStaff::find($this->id)->signature;
            }
            else
            {
                $validatedData['signature'] = null;
            }
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
            if($this->id)
            {
                $validatedData['document'] = SFStaff::find($this->id)->document;
            }
            else
            {
                $validatedData['document'] = null;
            }
        }

        $sfstaff->update([
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

        session()->flash('success','Personal SF actualizado exitosamente!');
        return redirect()->route('sfstaff.index');
    }

    public function updatedDocument()
    {
        $this->validate([
            'document'=>'file|mimes:pdf|max:10240',
        ]);

        $this->existingDoc=$this->document->store('sfstaff', 's3');
    }

    public function eliminarDocumento()
    {
        if ($this->existingDoc && Storage::disk('s3')->exists($this->existingDoc))
        {
            Storage::disk('s3')->delete($this->existingDoc);
        }

        $this->existingDoc=null;
        $this->document=null;
    }


    public function render()
    {
        $institutions=Institution::all();
        return view('livewire.sfstaff.edit', ['institutions'=>$institutions]);
    }
}
