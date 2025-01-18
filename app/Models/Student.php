<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function studentDocument()
    {
return $this->hasMany(StudentDocuments::class);
    }
    public function fessRecords()
    {
        return $this->hasMany(FeeRecords::class);
    }
    public function examMarks()
    {
        return $this->hasMany(ExamMark::class);
    }
    public function caMarks()
    {
        return $this->hasMany(caMark::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
