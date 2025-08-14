<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $fillable = [
        'sfstaff_id',
        'start_at',
        'end_at'
    ];

    public function staff()
    {
        return $this->belongsTo(SFStaff::class, 'sfstaff_id', 'dui');
    }
}
