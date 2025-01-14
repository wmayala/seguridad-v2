<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;

class Edit extends Component
{
    public $id, $name, $status;

    protected $rules=[
        'name'=>'required|string|max:255',
        'status'=>'boolean',
    ];

    public function mount($id)
    {
        $company=Company::findOrFail($id);
        $this->id=$company->id;
        $this->name=$company->name;
        $this->status=$company->status;
    }

    public function update()
    {
        $this->validate();
        $company=Company::findOrFail($this->id);
        $company->update([
            'name'=>$this->name,
            'status'=>$this->status,
        ]);

        session()->flash('success','Empresa actualizada exitosamente!');
        return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.companies.edit');
    }
}
