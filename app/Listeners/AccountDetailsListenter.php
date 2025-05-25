<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Notifications\AccountDetailsNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AccountDetailsListenter implements ShouldQueue
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
    public function handle(UserCreated $event): void
    {
        $event->user->notify(new AccountDetailsNotification($event->user, $event->defaultPassword));
    }
}
