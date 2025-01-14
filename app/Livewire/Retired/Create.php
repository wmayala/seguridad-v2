<?php

namespace App\Livewire\Retired;

use App\Models\Retired;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $record, $name, $position, $dui, $issueDate, $expirationDate, $photo, $signature, $status;

    protected $rules=[
        'record'=>'required|string',
        'name'=>'required|string|max:255',
        'dui'=>'required|string|max:10',
        'issueDate'=>'required|date',
        'expirationDate'=>'required|date',
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
            $photoPath=$this->photo->store('retired','public');
            $validateData['photo']=$photoPath;
        }
        else
        { $validateData['photo']=$this->photo; }

        if($this->signature)
        {
            if($this->signature && Storage::disk('public')->exists($this->signature))
            { Storage::disk('public')->delete($this->signature); }
            $signPath=$this->signature->store('retired','public');
            $validateData['signature']=$signPath;
        }
        else
        { $validateData['signature']=$this->signature; }

        Retired::create([
            'record'=>$this->record,
            'name'=>$this->name,
            'position'=>'Jubilado',
            'dui'=>$this->dui,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'photo'=>$validateData['photo'],
            'signature'=>$validateData['signature'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Jubilado agregado exitosamente!');
        return redirect()->route('retired.index');
    }

    public function render()
    {
        return view('livewire.retired.create');
    }
}
