<?php

namespace Kholyk\PhoneVerify;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Kholyk\PhoneVerify\Listeners\SendPhoneVerificationSMS;
use Kholyk\PhoneVerify\Events\VerifyPhoneEvent;
use Kholyk\PhoneVerify\Controllers\PhoneVerificationController;





class VerifyPhoneServiceProvider extends ServiceProvider
{

    protected $listen = [
        Events\VerifyPhoneEvent::class => [
            Listeners\SendPhoneVerificationSMS::class
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

        $this->registerMigrations();
        $this->registerViews();

//        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'phoneverify-migrations');

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('phone-verify.php'),
            ], 'honeverify-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/phoneverify'),
            ]);

            $this->defineRoutes();
//        }


    }

    protected function registerMigrations()
    {
        return $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    protected function defineRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'phoneverify');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'phone-verify');
        $this->app->make(PhoneVerificationController::class);
    }
}
