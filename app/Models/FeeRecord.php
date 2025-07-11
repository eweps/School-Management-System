<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeRecord extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
}
