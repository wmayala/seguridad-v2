<?php

namespace App\Livewire\Cstaff;

use Livewire\WithPagination;
use App\Models\CompaniesStaff;
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
        CompaniesStaff::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        $query = CompaniesStaff::query();

        if($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if(!$this->showAll) {
            $query->where('status', 1);
        }

        $CStaff = $query->paginate(15);

        return view('livewire.cstaff.index', compact('CStaff'));
    }
}
