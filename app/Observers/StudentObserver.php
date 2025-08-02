<?php

namespace App\Observers;

use App\Models\Student;

class StudentObserver
{
    public function created(Student $student)
    {
        // Automatically attach department's courses to this student
        $courseIds = $student->department
            ->courses()
            ->where('level_id', $student->level_id)
            ->pluck('id');

        $student->courses()->sync($courseIds);
    }
}
