<?php

namespace App\Livewire\Retired;

use App\Models\Retired;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $id, $record, $name, $position, $dui, $issueDate, $photo, $existingPhoto, $signature, $existingSign, $status, $expirationDate;

    protected $rules=[
        'record'=>'required|string',
        'name'=>'required|string|max:255',
        'dui'=>'required|string|max:10',
        'issueDate'=>'required|date',
        'expirationDate'=>'required|date',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'signature'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'boolean'
    ];

    public function mount($id)
    {
        $retired=Retired::findOrFail($id);
        $this->id=$retired->id;
        $this->record=$retired->record;
        $this->name=$retired->name;
        $this->position=$retired->position;
        $this->dui=$retired->dui;
        $this->issueDate=$retired->issueDate;
        $this->expirationDate=$retired->expirationDate;
        $this->existingPhoto=$retired->photo;
        $this->existingSign=$retired->signature;
        $this->status=$retired->status;
    }

    public function update()
    {
        $validatedData=$this->validate();
        $retired=Retired::findOrFail($this->id);

        if($this->photo)
        {
            $photoPath=$this->photo->store('retired','s3');
            Storage::disk('s3')->setVisibility($photoPath, 'public');
            $validatedData['photo']=$photoPath;
        }
        else
        {
            if ($this->id)
            {
                $validatedData['photo'] = Retired::find($this->id)->photo;
            }
            else
            {
                $validatedData['photo'] = null;
            }
        }

        if($this->signature)
        {
            $signPath=$this->signature->store('retired','s3');
            Storage::disk('s3')->setVisibility($signPath, 'public');
            $validatedData['signature']=$signPath;
        }
        else
        {
            if ($this->id)
            {
                $validatedData['signature'] = Retired::find($this->id)->signature;
            }
            else
            {
                $validatedData['signature'] = null;
            }
        }

        $retired->update([
            'record'=>$this->record,
            'name'=>$this->name,
            'position'=>'Jubilado',
            'dui'=>$this->dui,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'photo'=>$validatedData['photo'],
            'signature'=>$validatedData['signature'],
            'status'=>$this->status,
        ]);

        session()->flash('success','Jubilado actualizado exitosamente!');
        return redirect()->route('retired.index');
    }

    public function render()
    {
        return view('livewire.retired.edit');
    }
}
