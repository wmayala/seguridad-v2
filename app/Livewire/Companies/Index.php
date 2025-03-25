<?php

namespace App\Livewire\Companies;

use App\Models\Company;
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
        Company::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        $query = Company::query();

        if($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $companies = $query->paginate(10);

        return view('livewire.companies.index', compact('companies'));
    }
}
