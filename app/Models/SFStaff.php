<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SFStaff extends Model
{
    use HasFactory;

    protected $fillable=[
        'record',
        'zone',
        'name',
        'position',
        'dui',
        'duiPlace',
        'duiDate',
        'address',
        'birthPlace',
        'birthDate',
        'institution_id',
        'issueDate',
        'expirationDate',
        'photo',
        'signature',
        'status'
    ];
}
