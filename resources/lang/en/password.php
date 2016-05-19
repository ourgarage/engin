<?php

return [

    'title' => [
        'prepend' => 'Admin',
        'password-email' => 'Password reset',
        'password-form' => 'Password reset',
    ],

    'form' => [
        'password-email-title' => 'Password reset',
        'password-email-placeholder' => 'Email',
        'password-email-description' => 'In your email you will receive a letter containing a link to reset your password. Reference lifetime is 10 minutes.',
        'password-form-title' => 'Password reset',
        'password-password-placeholder' => 'Password',
        'password-confirmation-placeholder' => 'Retype password',
    ],

    'button' => [
        'password-email-submit' => 'Reset Password',
        'password-form-submit' => 'Reset Password',
    ],

    'notification' => [
        'password-email-error' => '{1} it took less than :minutes minute with previous request, please try again later.|[2,Inf] it took less than :minutes minutes with previous request, please try again later.',
        'password-email-success' => 'A letter has been sent successfully. Please check your mailbox.',
        'password-form-error' => 'The link you followed is invalid',
        'password-form-success' => 'Password successfully changed',
        'password-form-unknown-error' => 'An error has occurred. Please try again later.',
    ],

];
