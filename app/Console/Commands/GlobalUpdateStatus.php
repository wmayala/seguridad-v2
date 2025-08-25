<?php

namespace App\Console\Commands;

use App\Models\SFStaff;
use App\Models\StaffByActivity;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GlobalUpdateStatus extends Command
{
    protected $signature = 'app:global-update-status';
    protected $description = 'Actualizar registros vencidos a estado inactivo';

    public function handle()
    {
        $today = Carbon::today();

        $regs = SFStaff::whereDate('expirationDate', '<', $today)
            ->where('status', 1)
            ->update(['status' => 0]);

        $this->info("Se actualizaron {$regs} regsitros");
    }
}
