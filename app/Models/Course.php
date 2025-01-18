<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function learningResources()
    {
        return $this->hasMany(LearningResources::class);
    }
    public function examMarks()
    {
        return $this->hasMany(ExamMark::class);
    }
    public function semester()
    {
        return $this->belongTo(Semester::class);
    }
    public function caMarks()
    {
        return $this->hasMany(caMark::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function departments()
    {
       return $this->belongsToMany(Department::class,'course_departments'); 
    }
    public function teacherCourses()
    {
        return $this->hasMany(TeacherCourse::class);
    }
}
