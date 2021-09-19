<?php

namespace Kholyk\PhoneVerify\Listeners;

use Kholyk\PhoneVerify\Contracts\MustVerifyPhoneContract;
use Kholyk\PhoneVerify\Events\VerifyPhoneEvent;
use Kholyk\PhoneVerify\Drivers\Smsc;
use App\Models\User;

class SendPhoneVerificationSMS
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
     * @param  VerifyPhoneEvent  $event
     * @return void
     */
    public function handle(VerifyPhoneEvent $event)
    {
        $user = $event->user;
        $user->sms = rand(0000, 9999);
        $user->save();

        $sms = new Smsc($user->phone, $user->sms);
        $sms->send();
    }
}
