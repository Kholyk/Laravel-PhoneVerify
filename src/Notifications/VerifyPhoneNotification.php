<?php

namespace Kholyk\PhoneVerify\Notifications;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Kholyk\PhoneVerify\Contracts\MustVerifyPhoneContract;
use Kholyk\PhoneVerified\Drivers\Smsc;

class VerifyPhoneNotification extends Notification
{
    public function via($notifiable)
    {
        return [Smsc::class];
    }
}