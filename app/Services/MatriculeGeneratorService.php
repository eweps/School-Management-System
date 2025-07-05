<?php
namespace App\Services;

use App\Models\Setting;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;

class MatriculeGeneratorService
{
    public const MAX_ATTEMPT = 10;

    protected static function getPrefix(string $key, string $default): string
    {
        return Setting::where('name', $key)->value('value') ?? $default;
    }

    public static function forTeacher(int $user_id, int $attempt = 0): string
    {
        $maxAttempts = self::MAX_ATTEMPT;
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

    public static function forStudent(int $user_id, int $attempt = 0): string
    {
        $maxAttempts = self::MAX_ATTEMPT;
        if ($attempt >= $maxAttempts) {
            throw new \Exception("Unable to generate unique matricule after {$maxAttempts} attempts");
        }

        $year = now()->year;
        $count = Student::whereYear('created_at', $year)->count() + 1;
        $random = str_shuffle(Str::random(4)).$user_id;
    
        $prefix = self::getPrefix('MATRICULE_PREFIX', 'SM').'S';
        $matricule = strtoupper(sprintf('%s%s%s', $prefix, $year, $random . $count));

               
        if(Student::where('matricule', $matricule)->exists()) {
            return self::forStudent($user_id, $attempt + 1,);
        }

        return $matricule;
    }
}
