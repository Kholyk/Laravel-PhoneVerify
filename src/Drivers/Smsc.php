<?php

namespace Kholyk\PhoneVerified\Drivers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class Smsc
{
    public function __construct($phone, $payload, $prefixText = 'Код подтверждения:%20')
    {
        $this->phone = $phone;
        $this->payload = $payload;
        $this->prefixText = $prefixText;
        $this->url = 'https://smsc.ru/sys/send.php?login='
            . env('SMSC_LOGIN', 'no-login')
            . '&psw=' . env('SMSC_PASSWORD', '0000')
            . '&phones=' . $this->phone
            . $this->prefixText . $this->payload;
    }

    public function send()
    {
        try {
            $response = Http::get($this->url);

            return $response;
        } catch(\Exception $e) {
            return $e;
        }
    }
}