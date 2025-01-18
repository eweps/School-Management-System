<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class learning_resources extends Model
{
    public function teacher()
    {
        return $this->belongTo(Teacher::class);
    }
    public function course()
    {
        return $this->belongTo(Course::class);
    }
}
