<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stdent_Document extends Model
{
    public function student()
    {
        return $this->belongTo(student::class);
    }
}
