<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayRollTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    // Automatically cast data types for the application
    protected $casts = [
        'basic_salary_value' => 'decimal:2',
        // 'benefit_deduction_ids' => 'array', // Casts the JSON array of configuration IDs to a PHP array
    ];

    /**
     * RELATIONSHIPS
     */

    public function company()
    {
        // A payroll template belongs to one specific company
        return $this->belongsTo(Company::class);
    }

    public function employees()
    {
        // Links to the employees who have this specific template assigned
        // Assumes you have a 'payroll_template_id' in your employee_profiles table
        return $this->hasMany(EmployeeProfile::class, 'payroll_template_id');
    }
}
