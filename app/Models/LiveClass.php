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
        'start_time'
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
