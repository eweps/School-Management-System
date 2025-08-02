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

    public function updated(Student $student)
    {
        Log::info('Student updated: ' . $student->id);
        
        if ($student->wasChanged('department_id')) {

            Log::info('Student with ID: ' . $student->id . ' had department_id changed.');

            if ($student->department) {
                $courseIds = $student->department
                    ->courses()
                    ->where('level_id', $student->level_id)
                    ->pluck('courses.id');

                $student->courses()->sync($courseIds);
            };
        }

        if($student->courses()->count() === 0) {
            if ($student->department) {
                $courseIds = $student->department
                    ->courses()
                    ->where('level_id', $student->level_id)
                    ->pluck('courses.id');

                $student->courses()->sync($courseIds);
            };
        }

        
    }
}
