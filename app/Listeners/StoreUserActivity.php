<?php

namespace App\Listeners;

use App\Events\UserActivityEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreUserActivity
{
    /**
     * Handle the event.
     *
     * @param  UserActivityEvent  $event
     * @return void
     */
    public function handle(UserActivityEvent $event)
    {
        if ($event->user->activity){
            $event->user->activity()->update(["activity"=>$event->now]);
        } else {
            $event->user->activity()->create(["activity"=>$event->now]);
        }
    }
}
