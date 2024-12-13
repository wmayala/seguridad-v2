<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffByActivity extends Model
{
    use HasFactory;

    protected $fillable=[
        'record',
        'zone',
        'name',
        'activity_id',
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
        'registerDate',
        'expirationDate',
        'photo',
        'signature',
        'status',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
