<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayrollTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    // Automatically cast data types
    protected $casts = [
        'basic_salary_value' => 'decimal:2',
        'assigned_configurations' => 'array', // Casts the JSON to a PHP Array automatically
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
