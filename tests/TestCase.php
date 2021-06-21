<?php

namespace Loggable\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Loggable\LoggableServiceProvider;
use Loggable\Tests\Models\User;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LoggableServiceProvider::class,
        ];
    }

    /**
     * Define database migrations.
     *
     * @return void
     */
    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    protected function getUser()
    {
        return User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}