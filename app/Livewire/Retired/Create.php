<?php

namespace App\Livewire\Retired;

use App\Models\Retired;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $record, $name, $position, $dui, $issueDate, $expirationDate, $photo, $status;

    protected $rules=[
        'record'=>'required|string',
        'name'=>'required|string|max:255',
        'dui'=>'required|string|max:10',
        'issueDate'=>'required|date',
        'expirationDate'=>'required|date',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'boolean'
    ];

    public function create()
    {
        $this->validate();

        $photoPath=$this->photo->store('retired','public');

        Retired::create([
            'record'=>$this->record,
            'name'=>$this->name,
            'position'=>'Jubilado',
            'dui'=>$this->dui,
            'issueDate'=>$this->issueDate,
            'expirationDate'=>$this->expirationDate,
            'photo'=>$photoPath,
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
