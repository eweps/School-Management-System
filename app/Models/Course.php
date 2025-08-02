<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name',
        'code',
        'description',
        'credit_value',
        'semester_id',
        'level_id'
    ];

    public function learningResources()
    {
        return $this->hasMany(LearningResource::class);
    }

    public function examMarks()
    {
        return $this->hasMany(ExamMark::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function caMarks()
    {
        return $this->hasMany(CaMark::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'course_department')->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_course')->withTimestamps();
    }

    // public function students()
    // {
    //     return $this->belongsToMany(Student::class);
    // }
}
