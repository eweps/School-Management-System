<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [

            [
                "name" => "system_name",
                "value" => "School Manager"
            ],

            [
                "name" => "academic_year",
                "value" => "2024 / 2025"
            ],

            [
                "name" => "FILL_CA_MARKS",
                "value" => false
            ],

            [
                "name" => "FILL_EXAM_MARKS ",
                "value" => false
            ],

            [
                "name" => "TOTAL_CA_MARK",
                "value" => 30
            ],

            [
                "name" => "TOTAL_EXAM_MARK",
                "value" => 70
            ],

            [
                "name" => "MATRICULE_PREFIX",
                "value" => "SM"
            ]
            
        ];

        foreach($settings as $setting) {
            Setting::firstOrCreate([
                "name" => $setting['name'],
                "value" => $setting['value']
            ]);
        }
    }
}