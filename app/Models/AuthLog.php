<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthLog extends Model
{
    protected $table = 'authentication_log';

    protected $casts = [
        'login_at' => 'datetime',
        'logout_at' => 'datetime'
    ];
}
