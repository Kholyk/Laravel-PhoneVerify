<?php

namespace Kholyk\PhoneVerify\Contracts;

interface MustVerifyPhoneContract
{
    public function phoneVerified();

    public function setPhoneVerified();

    public function getPhoneForVerification();

    public function sendPhoneVerificationNotification();
}
