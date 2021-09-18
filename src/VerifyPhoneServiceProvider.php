<?php

namespace Kholyk\PhoneVerify;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;


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
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'phoneverify-migrations');

        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('phone-verify.php'),
        ], 'honeverify-config');
    }

    protected function registerMigrations()
    {
        return $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    protected function defineRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
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