<?php

namespace App\Livewire\Staffbyactivity;

use App\Models\Activity;
use App\Models\StaffByActivity;
use Livewire\Component;

class Create extends Component
{
    public $selectedActivity;
    public $record, $zone, $name, $activity, $gender, $birthPlace, $birthDate, $address, $phone, $mobile, $dui, $duiPlace, $duiDate, $duiProfession, $driverLicense, $workPlace, $workAddress, $workPhone, $spouse, $motherName, $fatherName, $parentsAddress, $skinColor, $registerDate, $expirationDate, $photo, $status;

    protected $rules=[
        'record'=>'required|string',
        'zone'=>'required|boolean',
        'name'=>'required|string|max:255',
        'activity'=>'required',
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
        'parentsAddress'=>'required|string',
        'skinColor'=>'required|string',
        'registerDate'=>'required|date',
        'expirationDate'=>'nullable|date',
        'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'required|boolean',
    ];

    public function create()
    {
        $this->validate();

        $photoPath=$this->photo->store('staff','public');

        StaffByActivity::create([
            'record'=>$this->record,
            'zone'=>$this->zone,
            'name'=>$this->name,
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
            'photo'=>$photoPath,
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
