<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diploma extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
