<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaMark extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function course()
    {
        return $this->belongsTo(course::class);
    }
}
