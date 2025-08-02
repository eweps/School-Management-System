<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaMark extends Model
{

    public $fillable = [
        'user_id',
        'student_id',
        'course_id',
        'mark'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
