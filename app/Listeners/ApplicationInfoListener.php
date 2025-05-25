<?php

namespace App\Listeners;

use App\Models\Application;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use App\Events\ApplicationSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmittedMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationInfoListener implements ShouldQueue
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
    public function handle(ApplicationSubmitted $event): void
    {
        app(\App\Services\HandleApplicationSubmission::class)->process($event->application);
    }

 
}
