<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaniesStaff extends Model
{
    use HasFactory;

    protected $fillable=[
        'record',
        'zone',
        'name',
        'position',
        'gender',
        'birthPlace',
        'birthDate',
        'address',
        'phone',
        'mobile',
        'dui',
        'duiPlace',
        'duiDate',
        'duiProfession',
        'driverLicense',
        'workPlace',
        'workAddress',
        'workPhone',
        'spouse',
        'motherName',
        'fatherName',
        'parentsAddress',
        'skinColor',
        'company_id',
        'issueDate',
        'expirationDate',
        'photo',
        'signature',
        'document',
        'status'
    ];
}
