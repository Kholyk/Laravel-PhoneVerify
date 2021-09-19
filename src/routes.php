<?php

use Kholyk\PhoneVerify\Controllers\PhoneVerificationController;


Route::middleware(['web', 'auth'])->group(function() {
    Route::get('phone/verify', [PhoneVerificationController::class, 'form']);
    Route::post('phone/verify', [PhoneVerificationController::class, 'verify']);
    Route::post('phone/verify/resend', [PhoneVerificationController::class, 'resend']);
});
