<?php

namespace App\Jobs;

use App\Models\LiveClass;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExpiredLiveClassesJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $now = Carbon::now();

        LiveClass::where('is_expired', false)
                    ->where('date', '<', $now)
                    ->update(['is_expired' => true]);
    }
}
