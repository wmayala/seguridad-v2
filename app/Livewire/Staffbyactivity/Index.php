<?php

namespace App\Livewire\Staffbyactivity;

use Livewire\WithPagination;
use App\Models\StaffByActivity;
use Livewire\Component;

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
        StaffByActivity::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        $query = StaffByActivity::query();

        if($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if(!$this->showAll) {
            $query->where('status', 1);
        }

        $staff = $query->paginate(15);

        return view('livewire.staffbyactivity.index', compact('staff'));
    }
}
