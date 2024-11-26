<?php

namespace App\Livewire\Retired;

use App\Models\Retired;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $id, $record, $name, $position, $dui, $issueDate, $photo, $existingPhoto, $status;

    protected $rules=[
        'record'=>'required|string',
        'name'=>'required|string|max:255',
        'dui'=>'required|string|max:10',
        'issueDate'=>'required|date',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'boolean'
    ];

    public function mount($id)
    {
        $retired=Retired::findOrFail($id);
        $this->id=$retired->id;
        $this->record=$retired->record;
        $this->name=$retired->name;
        $this->dui=$retired->dui;
        $this->issueDate=$retired->issueDate;
        $this->existingPhoto=$retired->photo;
        $this->status=$retired->status;
    }

    public function update()
    {
        $validatedData=$this->validate();

        $retired=Retired::findOrFail($this->id);

        if($this->photo)
        {
            if($retired->photo && Storage::disk('public')->exists($retired->photo))
            {
                Storage::disk('public')->delete($retired->photo);
            }
            $photoPath=$this->photo->store('retired', 'public');
            $validatedData['photo']=$photoPath;
        }
        else
        {
            $validatedData['photo']=$retired->photo;
        }

        $retired->update([
            'record'=>$this->record,
            'name'=>$this->name,
            'position'=>'Jubilado',
            'dui'=>$this->dui,
            'issueDate'=>$this->issueDate,
            'photo'=>$validatedData['photo'],
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
