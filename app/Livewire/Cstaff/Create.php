<?php

namespace App\Livewire\Cstaff;

use App\Models\CompaniesStaff;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $record, $zone, $name, $position, $gender, $birthPlace, $birthDate, $address, $phone, $mobile, $dui, $duiPlace, $duiDate, $duiProfession, $driverLicense, $workPlace, $workAddress, $workPhone, $spouse, $motherName, $fatherName, $parentsAddress, $skinColor, $company_id, $issueDate, $expirationDate, $photo, $signature, $document, $status;

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
        'company_id'=>'integer',
        'issueDate'=>'required|date',
        'expirationDate'=>'nullable|date',
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
            $photoPath=$this->photo->store('cstaff','public');
            $validateData['photo']=$photoPath;
        }
        else
        { $validateData['photo']=$this->photo; }

        if($this->signature)
        {
            if($this->signature && Storage::disk('public')->exists($this->signature))
            { Storage::disk('public')->delete($this->signature); }
            $signPath=$this->signature->store('cstaff','public');
            $validateData['signature']=$signPath;
        }
        else
        { $validateData['signature']=$this->signature; }

        if($this->document)
        {
            if($this->document && Storage::disk('public')->exists($this->document))
            { Storage::disk('public')->delete($this->document); }
            $docPath=$this->document->store('cstaff','public');
            $validateData['document']=$docPath;
        }
        else
        { $validateData['document']=$this->document; }

        CompaniesStaff::create([
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
            'photo'=>$validateData['photo'],
            'signature'=>$validateData['signature'],
            'document'=>$validateData['document'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Personal de empresas agregado exitosamente!');
        return redirect()->route('cstaff.index');
    }

    public function render()
    {
        $companies=Company::all();
        return view('livewire.cstaff.create', ['companies'=>$companies]);
    }
}
