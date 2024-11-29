<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SFVehicles extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'record',
        'institution_id',
        'type',
        'brand',
        'color',
        'plate',
        'issueDate',
        'expirationDate',
        'status',
        'photo',
    ];
}
