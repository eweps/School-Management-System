<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Disable foreign key checks (if needed)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Truncate the table
        Setting::truncate();
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $settings = [

            [
                "name" => "system_name",
                "type" => "text",
                "value" => "School Manager"
            ],

            [
                "name" => "academic_year",
                "type" => "text",
                "value" => "2024 / 2025"
            ],

            [
                "name" => "FILL_CA_MARKS",
                "type" => "boolean",
                "value" => false
            ],

            [
                "name" => "FILL_EXAM_MARKS ",
                "type" => "boolean",
                "value" => false
            ],

            [
                "name" => "TOTAL_CA_MARK",
                "type" => "int",
                "value" => 30
            ],

            [
                "name" => "TOTAL_EXAM_MARK",
                "type" => "int",
                "value" => 70
            ],

            [
                "name" => "MATRICULE_PREFIX",
                "type" => "text",
                "value" => "SM"
            ],
            [
                "name" => "LETTER_HEAD",
                "type" => "image",
                "value" => ""
            ]
        ];

        foreach($settings as $setting) {
            Setting::firstOrCreate([
                "name" => trim($setting['name']),
                "type" => $setting['type'],
                "value" => $setting['value']
            ]);
        }
    }
}