<?php

namespace App\Listeners;

use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Events\ApplicationSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmittedMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApplicationInfoListener implements ShouldQueue
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
    public function handle(ApplicationSubmitted $event): void
    {
        Mail::to($event->application->email)->send( new ApplicationSubmittedMail($event->application, $event->fileName));
    }
}
