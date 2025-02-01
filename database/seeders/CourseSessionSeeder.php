<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $session = [
        [
            'name'=>'Morning Session',
            'start_time'=>Carbon::today()->setTime(8,0),
            'end_time'=>Carbon::today()->setTime(15,0),

        ],
        [
            'name'=>'Evening Session',
            'sart_time'=>Carbon::today()->setTime(16,0),
            'end_time'=>Carbon::today()->setTime(20,0),
                    ]
        ];
        foreach($sessions as $session){
            CourseSession::firstOrCreate([
                'name'=>$session['name'],
                'start_time'=>$session['start_time'],
                'end_time'=>$session['end_time']
    

            ]);
        }
    }
}
