<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
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
        return $this->belongsToMany(Department::class, 'course_department');
    }

    public function teacherCourses()
    {
        return $this->hasMany(TeacherCourse::class);
    }
}
