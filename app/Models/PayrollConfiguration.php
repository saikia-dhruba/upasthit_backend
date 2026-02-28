<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EmployeeProfile;

class PayrollConfiguration extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    // Automatically cast data types for the application
    protected $casts = [
        'fixed_amount' => 'decimal:2',
        'percentage_value' => 'decimal:2',
        'percentage_of_heads' => 'array', // Automatically casts JSON to PHP Array
    ];

    /**
     * RELATIONSHIPS
     */

    public function company()
    {
        // A payroll configuration belongs to one specific company
        return $this->belongsTo(Company::class);
    }

    /**
     * Employee profiles that use this payroll configuration.
     */
    public function employeeProfiles()
    {
        return $this->belongsToMany(
            EmployeeProfile::class,
            'employee_profile_payroll_configuration',
            'payroll_configuration_id',
            'employee_profile_id'
        );
    }
}
