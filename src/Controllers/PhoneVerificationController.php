<?php

namespace Kholyk\PhoneVerify\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneVerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request)
    {
        return abort(415);
    }

    public function resend(Request $request)
    {
        return abort(415);;
    }
}