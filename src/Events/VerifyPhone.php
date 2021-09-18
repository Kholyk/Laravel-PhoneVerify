<?php

namespace Kholyk\PhoneVerify\Events;

use Kholyk\PhoneVerify\Contracts\MustVerifyPhoneContract;

class VerifyPhone
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}