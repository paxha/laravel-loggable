<?php

namespace Loggable;

use Illuminate\Support\ServiceProvider;

class LoggableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        /*Config Publishable*/
        $this->publishes([
            __DIR__.'/../config/laravel-loggable.php' => config_path('loggable.php'),
        ], 'loggable-config');
    }
}
