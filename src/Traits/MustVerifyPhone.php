<?php

namespace Kholyk\PhoneVerify\Traits;

use Kholyk\PhoneVerify\Notifications\VerifyPhoneNotification;


trait MustVerifyPhone
{
    public function phoneVerified()
    {
        return !is_null($this->phone_verified_at);
    }

    public function setPhoneVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => now(),
        ])->save();
    }

    public function getPhoneForVerification()
    {
        $phoneField = config('verify-phone.user_model_phone_number_field');

        return $this->{$phoneField};
    }

    public function sendPhoneVerificationNotification()
    {
        $this->notify(new VerifyPhoneNotification());
    }
}