<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{

    protected $fillable = [
        'name',
        'description'
    ];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
