<?php

namespace App\Livewire\Retired;

use App\Models\Retired;
use Livewire\Component;

class Edit extends Component
{
    public $id, $record, $name, $position, $dui, $issueDate, $photo, $status;

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
        $this->photo=$retired->photo;
        $this->status=$retired->status;
    }

    public function update()
    {
        $this->validate();

        $retired=Retired::findOrFail($this->id);

        if($this->photo && is_object($this->photo))
        {
            $photoPath = $this->photo->store('photos', 'public');
        }
        else
        {
            $photoPath = $retired->photo;
        }


        $retired->update([
            'record'=>$this->record,
            'name'=>$this->name,
            'position'=>'Jubilado',
            'dui'=>$this->dui,
            'issueDate'=>$this->issueDate,
            'photo'=>$photoPath,
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
