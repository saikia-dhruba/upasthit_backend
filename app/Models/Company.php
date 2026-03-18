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
        'company_code',
        'employee_code_start_with',
        'employee_count',
        'industry_type',
        'gstin',
        'phone_number',
        'email',
        'address',
        'is_geo_fenced',
        'gps_geofence_data',
        'pay_period',
        'enable_shift_wise_incentives',
        'enable_payroll_cycle',
        'payroll_cycle_start_day',
        'payroll_cycle_end_day',
        'company_logo' // <-- Make sure logo is here!
    ];

    protected $casts = [
        'gps_geofence_data' => 'array',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function employees()
    {
        return $this->hasMany(EmployeeProfile::class, 'company_id');
    }

    public function shifts()
    {
        return $this->hasMany(CompanyShift::class, 'company_id');
    }
}
