<?php

namespace Kholyk\PhoneVerify;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Kholyk\PhoneVerify\Listeners\SendPhoneVerificationNotification;

class VerifyPhoneServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendPhoneVerificationNotification::class,
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->loadRoutesFrom(__DIR__ . '/../routes/phone-verify.php');
        $this->loadMigrationsFrom(dirname(__DIR__) . '/../database/migrations');

        if (function_exists('config_path')) {
            $this->publishes([
                dirname(__DIR__) . '/../config/config.php' => config_path('phone-verify.php'),
            ], 'phone-verify-config');
        }

        $this->publishes([
            dirname(__DIR__) . '/../database/migrations' => database_path('migrations'),
        ], 'phone-verify-migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Kholyk\PhoneVerify\Controllers\VerificationController');
    }
}