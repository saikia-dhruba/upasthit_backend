<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EmployeeCategory;
use App\Models\PayrollConfiguration;

class EmployeeProfile extends Model
{
    // use SoftDeletes;
    protected $fillable = [
        'user_id',
        'company_id',
        'birth_date',
        'gender',
        'address',
        'emergency_contact_name',
        'emergency_contact_number',
        'employee_code',
        'role_type',
        'designation',
        'department',
        'employee_category_id',
        'date_of_joining',
        'reports_to_id',
        'wage_type',
        'salary',
        'payroll_template_id',
        'payroll_config',
        'allow_self_custom_salary',
        'can_view_self_salry',
        'applicable_for_overtime',
        'overtime_start_after',
        'overtime_hourly_rate',
        'week_off_extra_payment',
        'week_off_day',
        'shiftwise_attendance',
        'shift_alignment_type',
        'assigned_shifts',
        'casual_leaves',
        'sick_leaves',
        'privilege_leaves',
        'emergency_leaves',

        'bank_name',
        'bank_branch_name',
        'bank_account_holder_name',
        'bank_account_number',
        'bank_ifsc_code',
        'punch_location_rule',
        'allow_multiple_attendance',
        'allow_live_tracking',
        'allow_mobile_attendance',
        'require_ai_selfie_verification',

        'allow_self_odometer_reading',
        'is_archived',

    ];


    protected $casts = [
        'payroll_config' => 'array',
        'documents_urls' => 'array',
        'assigned_shifts' => 'array',
        'ai_reference_face_image_urls' => 'array',
        'birth_date' => 'date',
        'date_of_joining' => 'date',
    ];

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

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    /**
     * Category this employee belongs to.
     */
    public function category()
    {
        return $this->belongsTo(EmployeeCategory::class, 'employee_category_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
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
