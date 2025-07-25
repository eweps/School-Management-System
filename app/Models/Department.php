<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_department')->withTimestamps();
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}
