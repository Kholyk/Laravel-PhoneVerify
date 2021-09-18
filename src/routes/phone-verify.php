<?php

use Kholyk\PhoneVerify\Controllers\PhoneVerificationController;

Route::middleware(['auth'])->group(function() {
    Route::post('phone/verify', [PhoneVerificationController::class, 'verify']);
    Route::post('phone/verify/resend', [PhoneVerificationController::class, 'resend']);
});
