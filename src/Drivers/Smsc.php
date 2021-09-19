<?php

namespace Kholyk\PhoneVerify\Drivers;

use Carbon\Carbon;
use \Illuminate\Support\Facades\Http;
use Exception;

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
            . '&phones=' . $this->phone . '&mes='
            . $this->prefixText . $this->payload;
    }

    public function send()
    {
        try {
            $response = Http::get($this->url);
        } catch(Exception $e) {
            print_r($e);
        }
    }
}
