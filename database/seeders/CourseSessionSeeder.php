<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\CourseSession;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessions  = [
            [
                'name' => 'Morning Session',
                'start_time' => Carbon::today()->setTime(8, 0),
                'end_time' => Carbon::today()->setTime(15, 0),
            ],

            [
                'name' => 'Evening Session',
                'start_time' => Carbon::today()->setTime(16, 0),
                'end_time' => Carbon::today()->setTime(20, 0),
            ]
        ];

        foreach($sessions as $session) {
            CourseSession::firstOrCreate([
                'name' => $session['name'],
                'start_time' => $session['start_time'],
                'end_time' => $session['end_time']
            ]);
        }
    }
}
