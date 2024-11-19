<?php

namespace App\Livewire\Activities;

use App\Models\Activity;
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
        $activity=Activity::findOrFail($id);
        $this->id=$activity->id;
        $this->name=$activity->name;
        $this->status=$activity->status;
    }

    public function update()
    {
        $this->validate();
        $activity=Activity::findOrFail($this->id);
        $activity->update([
            'name'=>$this->name,
            'status'=>$this->status,
        ]);
        return redirect()->route('activities.index');
    }

    public function render()
    {
        return view('livewire.activities.edit');
    }
}
