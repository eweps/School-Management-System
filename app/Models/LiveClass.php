<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveClass extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'link',
        'date',
        'start_time',
        'is_expired'
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
        'is_expired' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
