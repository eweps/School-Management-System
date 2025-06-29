<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningResource extends Model
{
    protected $fillable = [
        'teacher_id',
        'course_id', 
        'name',
        'description',
        'path'
    ];

    public function teacher() 
    {
        return $this->belongsTo(Teacher::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    
}
