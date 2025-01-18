<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function learningResources()
    {
        return $this->hasMany(LearningResource::class);
    }

    public function teacherCourses()
    {
        return $this->hasMany(TeacherCourse::class);
    }
}
