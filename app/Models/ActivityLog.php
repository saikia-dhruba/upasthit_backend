<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'route',
        'method',
        'ip',
        'user_agent',
        'device_type',
        'request_data'
    ];

    protected $casts = [
        'request_data' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
