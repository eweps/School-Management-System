<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Services\MatriculeGeneratorService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenerateTeacherMatriculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::whereNull('matricule')->each(function ($teacher) {
        $teacher->matricule = MatriculeGeneratorService::forTeacher($teacher->user->id);
        $teacher->save();
});
    }
}
