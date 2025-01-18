<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeRecord extends Model
{
    public function students()
    {
        return $this->belongTo(student::class);
    }
}
