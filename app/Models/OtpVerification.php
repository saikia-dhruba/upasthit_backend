<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpVerification extends Model
{
    protected $fillable = ['identifier', 'otp', 'expires_at'];

    // Cast expires_at to a Carbon instance automatically
    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
