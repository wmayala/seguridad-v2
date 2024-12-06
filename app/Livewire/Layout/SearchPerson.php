<?php

namespace App\Livewire\Layout;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchPerson extends Component
{
    public $category, $query, $results;

    public function search()
    {
        $this->results=[];

        if(empty($this->query))
        {
            return;
        }

        $tables=[
            'staff_by_activities'=>['record','name','status'],
            'retireds'=>['record','name','status'],
            's_f_staff'=>['record','name','status'],
            'companies_staff'=>['record','name','status'],
            'beneficiaries'=>['record','name','status'],
        ];

        foreach($tables as $table => $columns)
        {
            $query=DB::table($table);

            foreach($columns as $column)
            {
                $query->orWhere($column,'like',"%{$this->query}%");
            }

            //$records=$query->get();
            $records=$query->select($columns)->get();

            if($records->isNotEmpty())
            {
                $this->results[$table]=$records;
            }
        }
    }

    public function render()
    {
        return view('livewire.layout.search-person');
    }
}
