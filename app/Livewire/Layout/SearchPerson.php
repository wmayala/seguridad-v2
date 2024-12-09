<?php

namespace App\Livewire\Layout;

use App\Models\Beneficiary;
use App\Models\CompaniesStaff;
use App\Models\StaffByActivity;
use App\Models\Retired;
use App\Models\SFStaff;
use Livewire\Component;

class SearchPerson extends Component
{
    public $categories=[];
    public $selectedCategory=null;
    public $search='';
    public $results=[];
    public $url='';
    public $cat='';

    protected $rules=['search'=>'required|string'];

    public function mount()
    {
        $this->categories = [
            'activity' => 'Por actividad',
            'retired' => 'Jubilados',
            'sf_staff' => 'Personal SF',
            'company_staff' => 'Personal empresas',
            'beneficiaries' => 'Beneficiarios',
        ];
    }

    public function updated()
    {
        $this->filterResults();
    }

    public function filterResults()
    {
        $this->validate();

        if(!$this->selectedCategory)
        {
            $this->results=[];
            return;
        }

        switch($this->selectedCategory)
        {
            case 'activity':
                $query=StaffByActivity::query();
                $param='staff.index';
                break;
            case 'retired':
                $query=Retired::query();
                $param='retired.index';
                break;
            case 'sf_staff':
                $query=SFStaff::query();
                $param='sfstaff.index';
                break;
            case 'company_staff':
                $query=CompaniesStaff::query();
                $param='cstaff.index';
                break;
            case 'beneficiaries':
                $query=Beneficiary::query();
                $param='beneficiaries.index';
                break;
            default:
                $this->results=[];
                return;
        }

        if($this->search)
        {
            $query->where('name','like','%'.$this->search.'%');
        }

        $this->results=$query->get();
        $this->url=$param;
        $this->cat=$this->categories[$this->selectedCategory];
    }

    public function clearInputs()
    {
        $this->search='';
        $this->selectedCategory=null;
        $this->results=[];
    }

    public function render()
    {
        return view('livewire.layout.search-person');
    }
}
