<?php

namespace Kholyk\PhoneVerify\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kholyk\PhoneVerify\Events\VerifyPhoneEvent;
use Illuminate\Support\Facades\Auth;

class PhoneVerificationController extends Controller
{

    public function form()
    {
        $user = Auth::user();
        var_dump($user);
        print_r('<hr>');
        var_dump(VerifyPhoneEvent::class);
        VerifyPhoneEvent::dispatch($user);
//        VerifyPhoneEvent::dispatch($user);


        return view('phoneverify.form');
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
