<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function user()
    {
       return  $this->hasOne(user::class);
    }
    public function learningResources()
    {
        return $this->hasMany(LearningResources::class);
    }
    public function teacherCourses()
    {
        return $this->hasMany(TeacherCourse::class);
    }
}
