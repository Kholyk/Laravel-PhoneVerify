<?php

namespace Kholyk\PhoneVerify;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;
use Kholyk\PhoneVerify\Providers\EventServiceProvider;





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
        $this->registerViews();

//        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations/2040_01_01_000000_update_users_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_update_users_table.php'),

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
        $this->app->register(EventServiceProvider::class);
    }
}
