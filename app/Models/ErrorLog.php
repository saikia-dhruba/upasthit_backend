<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'route',
        'method',
        'ip',
        'user_agent',
        'device_type',
        'message',
        'exception',
        'stack_trace',
        'request_data',
    ];

    protected $casts = [
        'request_data' => 'array',
    ];
}
