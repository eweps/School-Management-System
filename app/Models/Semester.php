<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
