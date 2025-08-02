<?php

namespace App\Observers;

use App\Models\Student;
use Illuminate\Support\Facades\Log;

class StudentObserver
{
    public function created(Student $student)
    {
        Log::info('Observer fired for student ID: ' . $student->id);

        if (!$student->department) {
            Log::warning('No department found for student ID: ' . $student->id);
            return;
        }

        $courseIds = $student->department
            ->courses()
            ->where('level_id', $student->level_id)
            ->pluck('courses.id');

        Log::info('Attaching courses: ' . $courseIds->implode(','));

        $student->courses()->sync($courseIds);
    }
}
