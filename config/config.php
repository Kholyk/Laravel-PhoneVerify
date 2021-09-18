<?php

return [
    // Enable Phone verification by SMS
    'enable_phone_verification' => true,

    // Timeout to resend SMS (seconds)
    'resend_timeout_interval' => 60,

    // User Model location
    'user_model_class' => 'App\Models\User',

    // DB Field name for user's phone
    'user_model_phone_number_field' => 'phone',

    // DB Field name for user's sms code
    'user_model_phone_sms_field' => 'sms',

];