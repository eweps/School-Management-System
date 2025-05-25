<?php

namespace App\Listeners;

use App\Events\ApplicationRejected;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejectedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\ApplicationRejectedNotification;

class ApplicationRejectedListener implements ShouldQueue
{
    use InteractsWithQueue;
    public $delay = 60;
    public $tries = 3;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ApplicationRejected $event): void
    {
        
        try {
            // Notify user
            Mail::to($event->application->email)->send(new ApplicationRejectedMail($event->application));

            Log::info("Application rejected email sent to: {$event->application->email}");
           
        } catch (\Throwable $e) {
            Log::error('ApplicationRejectedListener failed: ' . $e->getMessage(), [
                'exception' => $e,
            ]);
        }


       try {
            // Notify admin
            $event->user->notify(new ApplicationRejectedNotification($event->application));
            Log::info("Application rejected email sent to admin: {$event->user->email}");
            
       } catch (\Throwable $e) {
            Log::error('ApplicationRejectedListener failed: ' . $e->getMessage(), [
                'exception' => $e,
            ]);
       }
    }
}
