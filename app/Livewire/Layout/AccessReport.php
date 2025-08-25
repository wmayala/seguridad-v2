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
    public int|string $filterType = '';

    public function getAccess($paginate = false)
    {
        $query = Access::query()
            ->when($this->start, fn($q) => $q->whereDate('start_at', '>=', $this->start))
            ->when($this->end, fn($q) => $q->whereDate('start_at', '<=', $this->end))
            ->when($this->filterType, fn($q) => $q->where('type', $this->filterType))
            ->orderBy('start_at', 'desc');

        if ($this->filterType == 1)
        {
            $query->with(['sf_staff.institution']);
        }
        elseif ($this->filterType == 2)
        {
            $query->with(['sf_vehicle.institution']);
        }
        elseif ($this->filterType == 3)
        {
            $query->with(['beneficiary']);
        }

        return $query->get();
    }

    public function clearInputs()
    {
        $this->start = null;
        $this->end = null;
        $this->filterType = '';
    }

    public function exportPDF()
    {
        $accesses = $this->getAccess(false);

        if ($accesses->isEmpty())
        {
            session()->flash('success', 'No hay registros para generar el reporte.');
            return;
        }

        $pdf = Pdf::loadView('exports.accesses-report', [
            'accesses' => $accesses,
            'start' => $this->start,
            'end' => $this->end,
            'filterType' => $this->filterType,
        ])->setPaper('letter', 'landscape');

        return response()->streamDownload(function () use ($pdf)
        {
            echo $pdf->output();
        }, 'reporte-accesos.pdf');
    }

    public function render()
    {
        $accesses = $this->getAccess(true);
        return view('livewire.layout.access-report', ['accesses' => $accesses]);
    }
}
