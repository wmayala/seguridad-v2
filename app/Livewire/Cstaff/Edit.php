<?php

namespace App\Livewire\Cstaff;

use App\Models\CompaniesStaff;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use  WithFileUploads;

    public $id, $record, $zone, $name, $position, $gender, $birthPlace, $birthDate, $address, $phone, $mobile, $dui, $duiPlace, $duiDate, $duiProfession, $driverLicense, $workPlace, $workAddress, $workPhone, $spouse, $motherName, $fatherName, $parentsAddress, $skinColor, $company_id, $company_name, $issueDate, $expirationDate, $photo, $existingPhoto, $signature, $existingSign, $document, $existingDoc, $status;

    protected $rules=[
        'record'=>'required|string',
        'zone'=>'required|integer',
        'name'=>'required|string|max:255',
        'position'=>'required|string',
        'gender'=>'required|boolean',
        'birthPlace'=>'required|string',
        'birthDate'=>'required|date',
        'address'=>'required|string',
        'phone'=>'nullable|string|max:8',
        'mobile'=>'nullable|string|max:8',
        'dui'=>'required|string|max:10',
        'duiPlace'=>'required|string',
        'duiDate'=>'required|date',
        'duiProfession'=>'required|string',
        'driverLicense'=>'nullable|string|min:10|max:14',
        'workPlace'=>'nullable|string',
        'workAddress'=>'nullable|string',
        'workPhone'=>'nullable|string|max:8',
        'spouse'=>'nullable|string',
        'motherName'=>'nullable|string',
        'fatherName'=>'nullable|string',
        'parentsAddress'=>'nullable|string',
        'skinColor'=>'nullable|string',
        'issueDate'=>'required|date',
        'expirationDate'=>'nullable|date',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'signature'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'document'=>'nullable|file|max:2048',
        'status'=>'boolean',
    ];

    public function mount($id)
    {
        $cstaff=CompaniesStaff::findOrfail($id);
        $this->id=$cstaff->id;
        $this->record=$cstaff->record;
        $this->zone=$cstaff->zone;
        $this->name=$cstaff->name;
        $this->position=$cstaff->position;
        $this->gender=$cstaff->gender;
        $this->birthPlace=$cstaff->birthPlace;
        $this->birthDate=$cstaff->birthDate;
        $this->address=$cstaff->address;
        $this->phone=$cstaff->phone;
        $this->mobile=$cstaff->mobile;
        $this->dui=$cstaff->dui;
        $this->duiPlace=$cstaff->duiPlace;
        $this->duiDate=$cstaff->duiDate;
        $this->duiProfession=$cstaff->duiProfession;
        $this->driverLicense=$cstaff->driverLicense;
        $this->workPlace=$cstaff->workPlace;
        $this->workAddress=$cstaff->workAddress;
        $this->workPhone=$cstaff->workPhone;
        $this->spouse=$cstaff->spouse;
        $this->motherName=$cstaff->motherName;
        $this->fatherName=$cstaff->fatherName;
        $this->parentsAddress=$cstaff->parentsAddress;
        $this->skinColor=$cstaff->skinColor;
        $this->company_id=$cstaff->company_id;
        $this->issueDate=$cstaff->issueDate;
        $this->expirationDate=$cstaff->expirationDate;
        $this->existingPhoto=$cstaff->photo;
        $this->existingSign=$cstaff->signature;
        $this->existingDoc=$cstaff->document;
        $this->status=$cstaff->status;

        if($this->company_id)
        { $company=Company::findOrFail($this->company_id); }
        else
        { $company=Company::findOrFail(1); }
        $this->company_name=$company->name;
    }

    public function update()
    {
        $validatedData=$this->validate();
        $cstaff=CompaniesStaff::findOrFail($this->id);

        if($this->photo)
        {
            if($cstaff->photo && Storage::disk('public')->exists($cstaff->photo))
            { Storage::disk('public')->delete($cstaff->photo); }
            $photoPath=$this->photo->store('cstaff', 'public');
            $validatedData['photo']=$photoPath;
        }
        else
        { $validatedData['photo']=$cstaff->photo; }

        if($this->signature)
        {
            if($cstaff->signature && Storage::disk('public')->exists($cstaff->signature))
            { Storage::disk('public')->delete($cstaff->signature); }
            $signPath=$this->signature->store('cstaff', 'public');
            $validatedData['signature']=$signPath;
        }
        else
        { $validatedData['signature']=$cstaff->signature; }

        if($this->document)
        {
            if($cstaff->document && Storage::disk('public')->exists($cstaff->document))
            { Storage::disk('public')->delete($cstaff->document); }
            $docPath=$this->document->store('cstaff', 'public');
            $validatedData['document']=$docPath;
        }
        else
        { $validatedData['document']=$cstaff->document; }

        $cstaff->update([
            'record'=>$this->record,
            'zone'=>$this->zone,
            'name'=>$this->name,
            'position'=>$this->position,
            'gender'=>$this->gender,
            'birthPlace'=>$this->birthPlace,
            'birthDate'=>$this->birthDate,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'mobile'=>$this->mobile,
            'dui'=>$this->dui,
            'duiPlace'=>$this->duiPlace,
            'duiDate'=>$this->duiDate,
            'duiProfession'=>$this->duiProfession,
            'driverLicense'=>$this->driverLicense,
            'workPlace'=>$this->workPlace,
            'workAddress'=>$this->workAddress,
            'workPhone'=>$this->workPhone,
            'spouse'=>$this->spouse,
            'motherName'=>$this->motherName,
            'fatherName'=>$this->fatherName,
            'parentsAddress'=>$this->parentsAddress,
            'skinColor'=>$this->skinColor,
            'company_id'=>$this->company_id,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'photo'=>$validatedData['photo'],
            'signature'=>$validatedData['signature'],
            'document'=>$validatedData['document'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Personal de empresa actualizado exitosamente!');
        return redirect()->route('cstaff.index');
    }

    public function render()
    {
        $companies=Company::all();
        return view('livewire.cstaff.edit',['companies'=>$companies]);
    }
}
