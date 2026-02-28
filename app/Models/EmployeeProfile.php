<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EmployeeCategory;
use App\Models\PayrollConfiguration;

class EmployeeProfile extends Model
{
    use SoftDeletes;

    /**
     * Categories for which this profile is a manager.
     */
    public function managedCategories()
    {
        return $this->belongsToMany(
            EmployeeCategory::class,
            'employee_category_manager',
            'manager_id',
            'employee_category_id'
        );
    }

    /**
     * Category this employee belongs to.
     */
    public function category()
    {
        return $this->belongsTo(EmployeeCategory::class, 'employee_category_id');
    }

    /**
     * Payroll configurations assigned to this employee.
     */
    public function payrollConfigurations()
    {
        return $this->belongsToMany(
            PayrollConfiguration::class,
            'employee_profile_payroll_configuration',
            'employee_profile_id',
            'payroll_configuration_id'
        );
    }
}
