<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthSignatures extends Model
{
    use HasFactory;

    protected $fillable=[
        'record',
        'institution_id',
        'description',
        'issueDate',
        'expirationDate',
        'document',
        'status',
    ];
}
