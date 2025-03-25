<?php

namespace App\Livewire\Activities;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Activity;

class Index extends Component
{
    use WithPagination;

    public $search = '';

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
        Activity::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        $query = Activity::query();

        if($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $activities = $query->paginate(10);

        return view('livewire.activities.index', compact('activities'));
    }
}
