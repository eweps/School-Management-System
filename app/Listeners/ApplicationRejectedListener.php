<?php

namespace App\Listeners;

use App\Events\ApplicationRejected;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejectedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationRejectedListener implements ShouldQueue
{
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
         Mail::to($event->application->email)->send(new ApplicationRejectedMail($event->application));
    }
}
