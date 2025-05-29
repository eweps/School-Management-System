<?php
namespace App\Services;

use App\Models\Setting;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;

class MatriculeGeneratorService
{
    protected static function getPrefix(string $key, string $default): string
    {
        return Setting::where('name', $key)->value('value') ?? $default;
    }

    public static function forTeacher(int $user_id, int $attempt = 0): string
    {
        $maxAttempts = 10;
        if ($attempt >= $maxAttempts) {
            throw new \Exception("Unable to generate unique matricule after {$maxAttempts} attempts");
        }

        $year = now()->year;
        $random = str_shuffle(Str::random(4)).$user_id;
    
        $prefix = self::getPrefix('MATRICULE_PREFIX', 'SM').'T';
        $matricule = strtoupper(sprintf('%s%s%s', $prefix, $year, $random));
       
        if(Teacher::where('matricule', $matricule)->exists()) {
            return self::forTeacher($user_id, $attempt + 1,);
        }

        return $matricule;
    }

    // public static function forStudent($departmentCode = 'GEN', $level = 'HND'): string
    // {
    //     $year = now()->year;
    //     $count = Student::whereYear('created_at', $year)->count() + 1;

    //     $prefix = self::getPrefix('MATRICULE_PREFIX', 'STD');

    //     return strtoupper(sprintf('%s/%s/%s/%04d', $prefix, $departmentCode, $year, $count));
    // }
}
