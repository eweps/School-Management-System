<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description'
    ];
    
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
