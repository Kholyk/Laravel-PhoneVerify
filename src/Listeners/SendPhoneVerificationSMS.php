<?php

namespace Kholyk\PhoneVerify\Listeners;

use Kholyk\PhoneVerify\Contracts\MustVerifyPhoneContract;
use Kholyk\PhoneVerify\Events\VerifyPhone;
use Kholyk\PhoneVerified\Drivers\Smsc;

class SendPhoneVerificationSMS
{
    public function handle(VerifyPhone $event)
    {
        if ($event->user instanceof MustVerifyPhoneContract
            && !$event->user->phoneVerified()
            && config('verify.send_verify_sms',true)
        ) {
            $phoneField = caonfig('phone-verify.user_model_phone_number_field');
            $phone = $event->user->{$phoneField};
            $sms = new Smsc($phone, 'testcode');
            $sms->send();
        }
    }
}
