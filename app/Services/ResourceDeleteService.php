<?php

namespace App\Services;

use App\Models\Level;
use App\Models\Diploma;
use App\Models\Application;
use App\Models\CourseSession;
use App\Exceptions\CannotDeleteUsedResourceException;

class ResourceDeleteService
{
    public function checkAndDeleteDiplomaInApplicationsTable(Diploma $diploma)
    {
        if ($diploma->applications()->exists()) {
            throw new CannotDeleteUsedResourceException('Diploma');
        }
        $diploma->delete();
    }

    public function checkAndDeleteCourseSessionInApplicationsTable(CourseSession $courseSession) {
        if($courseSession->applications()->exists()){
            throw new CannotDeleteUsedResourceException('Course Session');
        }
        $courseSession->delete();
    }
}