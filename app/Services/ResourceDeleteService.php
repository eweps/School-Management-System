<?php

namespace App\Services;

use App\Models\Level;
use App\Models\Diploma;
use App\Models\Department;
use App\Models\Application;
use App\Models\CourseSession;
use App\Exceptions\CannotDeleteUsedResourceException;

class ResourceDeleteService
{
    public function checkAndDeleteDiploma(Diploma $diploma)
    {
        if ($diploma->applications()->exists()) {
            throw new CannotDeleteUsedResourceException('Diploma');
        }
        $diploma->delete();
    }

    public function checkAndDeleteCourseSession(CourseSession $courseSession) {
        if($courseSession->applications()->exists()){
            throw new CannotDeleteUsedResourceException('Course Session');
        }
        $courseSession->delete();
    }

     public function checkAndDeleteDepartment(Department $department) {
        if($department->courses()->exists()){
            throw new CannotDeleteUsedResourceException('Department');
        }
        $department->delete();
    }
}