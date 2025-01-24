<?php

namespace App\Livewire\Staffbyactivity;

use App\Models\Activity;
use App\Models\StaffByActivity;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $id, $record, $zone, $name, $activity_id, $activity_name, $gender, $birthPlace, $birthDate, $address, $phone, $mobile, $dui, $duiPlace, $duiDate, $duiProfession, $driverLicense, $workPlace, $workAddress, $workPhone, $spouse, $motherName, $fatherName, $parentsAddress, $skinColor, $registerDate, $expirationDate, $photo, $existingPhoto, $signature, $existingSign, $status;

    protected $rules=[
        'record'=>'required|string',
        'zone'=>'required|integer',
        'name'=>'required|string|max:255',
        'activity_id'=>'required',
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
        'registerDate'=>'required|date',
        'expirationDate'=>'nullable|date',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'signature'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'boolean',
    ];

    public function mount($id)
    {
        $staff=StaffByActivity::findOrFail($id);
        $this->id=$staff->id;
        $this->record=$staff->record;
        $this->zone=$staff->zone;
        $this->name=$staff->name;
        $this->activity_id=$staff->activity_id;
        $this->gender=$staff->gender;
        $this->birthPlace=$staff->birthPlace;
        $this->birthDate=$staff->birthDate;
        $this->address=$staff->address;
        $this->phone=$staff->phone;
        $this->mobile=$staff->mobile;
        $this->dui=$staff->dui;
        $this->duiPlace=$staff->duiPlace;
        $this->duiDate=$staff->duiDate;
        $this->duiProfession=$staff->duiProfession;
        $this->driverLicense=$staff->driverLicense;
        $this->workPlace=$staff->workPlace;
        $this->workAddress=$staff->workAddress;
        $this->workPhone=$staff->workPhone;
        $this->spouse=$staff->spouse;
        $this->motherName=$staff->motherName;
        $this->fatherName=$staff->fatherName;
        $this->parentsAddress=$staff->parentsAddress;
        $this->skinColor=$staff->skinColor;
        $this->registerDate=$staff->registerDate;
        $this->expirationDate=$staff->expirationDate;
        $this->existingPhoto=$staff->photo;
        $this->existingSign=$staff->signature;
        $this->status=$staff->status;

        if($this->activity_id)
        { $activity=Activity::findOrFail($this->activity_id); }
        else
        { $activity=Activity::findOrFail(1); }
        $this->activity_name=$activity->name;
    }

    public function updatedActivityId($id)
    {
        $activity=Activity::findOrFail($this->activity_id);
        $this->activity_name=$activity->name;
    }

    public function update()
    {
        $validatedData=$this->validate();
        $staff=StaffByActivity::findOrFail($this->id);

        //dd($staff);

        if($this->photo)
        {
            if($staff->photo && Storage::disk('public')->exists($staff->photo))
            { Storage::disk('public')->delete($staff->photo); }
            $photoPath=$this->photo->store('staff', 'public');
            $validatedData['photo']=$photoPath;
        }
        else
        { $validatedData['photo']=$staff->photo; }

        if($this->signature)
        {
            if($staff->signature && Storage::disk('public')->exists($staff->signature))
            { Storage::disk('public')->delete($staff->signature); }
            $signPath=$this->signature->store('staff', 'public');
            $validatedData['signature']=$signPath;
        }
        else
        { $validatedData['signature']=$staff->signature; }

        $staff->update([
            'record'=>$this->record,
            'zone'=>$this->zone,
            'name'=>$this->name,
            'activity_id'=>$this->activity_id,
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
            'registerDate'=>$this->registerDate,
            'expirationDate'=>$this->expirationDate,
            'photo'=>$validatedData['photo'],
            'signature'=>$validatedData['signature'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Personal actualizado exitosamente!');
        return redirect()->route('staff.index');
    }

    public function render()
    {
        $activities=Activity::all();
        return view('livewire.staffbyactivity.edit',['activities'=>$activities]);
    }
}
