<?php

namespace Loggable\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Loggable\Events\LogEvent;

class LogListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(LogEvent $event)
    {
//        dd(gettype($event->after));
        $event->after->logs()->create([
            'user_id' => $event->user_id,
            'description' => $event->description,
            'before' => json_encode($event->before),
            'after' => json_encode($event->after),
        ]);
    }
}
