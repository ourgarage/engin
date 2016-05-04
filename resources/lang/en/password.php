<?php

return [

    'title' => [
        'prepend' => 'Admin',
        'password-email' => 'Password reset',
    ],

    'form' => [
        'password-email-title' => 'Password reset',
        'password-email-placeholder' => 'Email',
        'password-email-description' => 'In your email you will receive a letter containing a link to reset your password. Reference lifetime is 10 minutes.'
    ],

    'button' => [
        'password-email-submit' => 'Reset Password',
    ],

    'notification' => [
        'password-email-error' => 'it took less than :minutes minutes with previous request, please try again later.',
        'password-email-success' => 'A letter has been sent successfully. Please check your mailbox.',
    ],

];
