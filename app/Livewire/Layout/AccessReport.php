<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Access;
use Barryvdh\DomPDF\Facade\Pdf;

class AccessReport extends Component
{
    public $start;
    public $end;

    public function getAccess()
    {
        $query = Access::with(['staff.institution']);

        if (!empty($this->start)) {
            $query->whereDate('start_at', '>=', $this->start);
        }

        if (!empty($this->end)) {
            $query->whereDate('start_at', '<=', $this->end);
        }

        return $query->orderBy('start_at', 'desc')->get();
    }

    public function clearInputs()
    {
        $this->start = null;
        $this->end = null;
    }

    public function exportPDF()
    {
        $accesses = $this->getAccess();

        $pdf = Pdf::loadView('exports.access-report', [
            'accesses' => $accesses,
            'start' => $this->start,
            'end' => $this->end
        ])->setPaper('letter', 'landscape');

        return response()->streamDownload(function () use ($pdf)
        {
            echo $pdf->output();
        }, 'reporte-accesos.pdf');
    }

    public function render()
    {
        $accesses = $this->getAccess();
        return view('livewire.layout.access-report', compact('accesses'));
    }
}
