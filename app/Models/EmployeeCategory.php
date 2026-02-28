<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeCategory extends Model
{
    /**
     * Managers assigned to this category.
     * Many-to-many relationship with employee_profiles.
     */
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];

    /**
     * RELATIONSHIPS
     */

    public function company()
    {
        // The category belongs to a specific company
        return $this->belongsTo(Company::class);
    }
    public function managers()
    {
        return $this->belongsToMany(
            EmployeeProfile::class,
            'employee_category_manager',
            'employee_category_id',
            'manager_id'
        );
    }

    /**
     * Employees assigned to this category.
     */
    public function employees()
    {
        return $this->hasMany(EmployeeProfile::class, 'employee_category_id');
    }
}
