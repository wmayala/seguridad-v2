<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $fillable=[
        'record',
        'name',
        'age',
        'relationship',
        'empCode',
        'empName',
        'institution',
        'issueDate',
        'expirationDate',
        'photo',
        'signature',
        'status',
    ];
}
