<?php

namespace App\Livewire\Companies;

use Livewire\Component;
use App\Models\Company;

class Create extends Component
{
    public $name, $status;

    protected $rules=[
        'name'=>'required|string|max:255',
        'status'=>'boolean',
    ];

    public function create()
    {
        $this->validate();

        Company::create([
            'name'=>$this->name,
            'status'=>$this->status,
        ]);

        session()->flash('success','Empresa creada exitosamente!');
        redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.companies.create');
    }
}
