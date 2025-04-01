<?php

namespace App\Livewire\Sfstaff;

use App\Models\SFStaff;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showAll = false;
    public $search = '';

    public function viewAll()
    {
        $this->showAll = true;
        $this->resetPage();
    }

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
        SFStaff::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        $query = SFStaff::query();

        if($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if(!$this->showAll) {
            $query->where('status', 1);
        }

        $SFstaff = $query->paginate(10);

        return view('livewire.sfstaff.index', compact('SFstaff'));
    }
}
