<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retired extends Model
{
    protected $fillable=[
        'record',
        'name',
        'position',
        'dui',
        'issueDate',
        'photo',
        'status',
    ];
}
