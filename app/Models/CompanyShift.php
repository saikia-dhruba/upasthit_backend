<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyShift extends Model
{
    use HasFactory, SoftDeletes;

    // Allow all fields to be mass-assigned except the primary key
    protected $guarded = ['id'];

    // Automatically cast data types for the application
    protected $casts = [
        'is_overnight_shift' => 'boolean',
        'auto_punch_out' => 'boolean',
        'has_minimum_working_hours' => 'boolean',

        'number_of_lates_for_half_day' => 'integer',
        'number_of_early_departures_for_half_day' => 'integer',
        'number_of_lates_for_absent' => 'integer',
        'number_of_early_departures_for_absent' => 'integer',
    ];

    /**
     * RELATIONSHIPS
     */

    public function company()
    {
        // A shift belongs to one specific company
        return $this->belongsTo(Company::class);
    }

    public function employees()
    {
        // Employees assigned to this specific shift
        // (Assuming you add a 'shift_id' foreign key to the employee_profiles table)
        return $this->hasMany(EmployeeProfile::class, 'selected_shift', 'id');
    }
}
