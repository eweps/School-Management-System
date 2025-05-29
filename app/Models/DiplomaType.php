<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiplomaType extends Model
{
    public function diplomas()
    {
        return $this->hasMany(Diploma::class);
    }
}
