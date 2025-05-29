<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diploma extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'diploma_type_id',
        'department_id'
    ];

    public function diplomaType()
    {
        return $this->belongsTo(DiplomaType::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
