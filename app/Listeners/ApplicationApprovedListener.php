<?php

namespace App\Listeners;

use App\Events\ApplicationApproved;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationApprovedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\ApplicationApprovedNotification;

class ApplicationApprovedListener implements ShouldQueue
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
    public function handle(ApplicationApproved $event): void
    {

        try {
            // Notify user
            Mail::to($event->application->email)
                ->send(new ApplicationApprovedMail($event->application));
            Log::info("Application approved email sent to: {$event->application->email}");
           
        } catch (\Throwable $e) {
            Log::error('ApplicationApprovedListener failed: ' . $e->getMessage(), [
                'exception' => $e,
            ]);
        }


       try {
            // Notify admin
            $event->user->notify(new ApplicationApprovedNotification($event->application));
            Log::info("Application approved email sent to admin: {$event->user->email}");

       } catch (\Throwable $e) {
            Log::error('ApplicationApprovedListener failed: ' . $e->getMessage(), [
                'exception' => $e,
            ]);
       }
        
    }
}
