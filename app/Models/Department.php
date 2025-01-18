<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_department');
    }
}
