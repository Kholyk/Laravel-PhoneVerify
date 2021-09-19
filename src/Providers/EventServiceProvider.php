<?php

namespace Kholyk\PhoneVerify\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Kholyk\PhoneVerify\Events\VerifyPhoneEvent;
use Kholyk\PhoneVerify\Listeners\SendPhoneVerificationSMS;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        VerifyPhoneEvent::class => [
            SendPhoneVerificationSMS::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}