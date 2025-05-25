<?php

namespace App\Listeners;

use App\Events\ApplicationApproved;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationApprovedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApplicationApprovedListener implements ShouldQueue
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
    public function handle(ApplicationApproved $event): void
    {
         Mail::to($event->application->email)->send(new ApplicationApprovedMail($event->application));
    }
}
