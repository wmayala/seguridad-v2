<?php

namespace App\Livewire\Staffbyactivity;

use App\Models\Activity;
use App\Models\StaffByActivity;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

use function Livewire\store;

class Create extends Component
{
    use WithFileUploads;

    public $record, $zone, $name, $activity_id, $gender, $birthPlace, $birthDate, $address, $phone, $mobile, $dui, $duiPlace, $duiDate, $duiProfession, $driverLicense, $workPlace, $workAddress, $workPhone, $spouse, $motherName, $fatherName, $parentsAddress, $skinColor, $registerDate, $expirationDate, $photo, $signature, $status;

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

    public function create()
    {
        $validateData=$this->validate();

        if($this->photo)
        {
            if($this->photo && Storage::disk('public')->exists($this->photo))
            { Storage::disk('public')->delete($this->photo); }
            $photoPath=$this->photo->store('staff','public');
            $validateData['photo']=$photoPath;
        }
        else
        { $validateData['photo']=$this->photo; }

        if($this->signature)
        {
            if($this->signature && Storage::disk('public')->exists($this->signature))
            { Storage::disk('public')->delete($this->signature); }
            $signPath=$this->signature->store('staff','public');
            $validateData['signature']=$signPath;
        }
        else
        { $validateData['signature']=$this->signature; }


        StaffByActivity::create([
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
            'photo'=>$validateData['photo'],
            'signature'=>$validateData['signature'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Personal agregado exitosamente!');

        return redirect()->route('staff.index');
    }

    public function render()
    {
        $activities=Activity::all();
        return view('livewire.staffbyactivity.create', ['activities'=>$activities]);
    }
}
