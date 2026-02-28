<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;


    
    protected $fillable = [
        'owner_id',
        'company_name',
        'industry_type',
        'gps_geofence_data',
    ];

    protected $casts = [
        'gps_geofence_data' => 'array',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    // public function employees()
    // {
    //     // Has many employees, linked by 'company_id' on the employee profile table
    //     // matching the 'id' on this company table.
    //     return $this->hasMany(EmployeeProfile::class, 'company_id', 'id');
    // }
}
