<?php

namespace Database\Seeders;

use App\Models\DiplomaType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiplomaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Professional Diplomas',
            'Higher National Diploma',
            'Professional Bachelors Degree',
            'International Certifications',
            'Tailored and holiday Classes',
            'Professional Masters Degree',
        ];

        foreach ($types as $type) {
            DiplomaType::firstOrCreate([
                'name' => $type
            ]);
        }
    }
}
