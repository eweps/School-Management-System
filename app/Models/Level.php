<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
