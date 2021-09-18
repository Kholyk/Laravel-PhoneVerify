<?php

namespace Kholyk\PhoneVerify;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;


class VerifyPhoneServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
            $this->registerMigrations();

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'phoneverify-migrations');
    }

    protected function registerMigrations()
    {
        return $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->make('Kholyk\PhoneVerify\Controllers\VerificationController');
    }
}