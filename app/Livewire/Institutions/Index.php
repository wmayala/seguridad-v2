<?php

namespace App\Livewire\Institutions;

use App\Models\Institution;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search='';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function redirectTo($route, $param)
    {
        return redirect()->route($route, $param);
    }

    public function delete($id)
    {
        Institution::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        $query = Institution::query();

        if($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $institutions = $query->paginate(10);

        return view('livewire.institutions.index', compact('institutions'));
    }
}
