<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $fillable = [
        'identifier',
        'type',
        'start_at',
        'end_at'
    ];

    public function sf_staff()
    {
        return $this->belongsTo(SFStaff::class, 'identifier', 'dui');
    }

    public function sf_vehicle()
    {
        return $this->belongsTo(SFVehicles::class, 'identifier', 'plate');
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'identifier', 'record');
    }
}
