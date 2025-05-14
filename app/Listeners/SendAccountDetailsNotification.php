<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Notifications\AccountDetailsNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAccountDetailsNotification implements ShouldQueue
{

    public $delay = 60;

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
    public function handle(UserCreated $event): void
    {
        $event->user->notify(new AccountDetailsNotification($event->user, $event->defaultPassword));
    }
}
