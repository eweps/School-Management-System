<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function studentDocuments()
    {
        return $this->hasMany(StudentDocument::class);
    }

    public function feeRecords()
    {
        return $this->hasMany(FeeRecord::class);
    }

    public function examMarks()
    {
        return $this->hasMany(ExamMark::class);
    }

    public function caMarks()
    {
        return $this->hasMany(CaMark::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
