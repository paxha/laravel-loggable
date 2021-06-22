<?php

namespace Loggable;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Loggable\Events\LogEvent;
use Loggable\Listeners\LogListener;

class LoggableEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        LogEvent::class => [
            LogListener::class
        ]
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
