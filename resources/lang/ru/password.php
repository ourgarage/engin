<?php

return [

    'title' => [
        'prepend' => 'Админ',
        'password-email' => 'Сброс пароля',
        'password-form' => 'Сброс пароля',
    ],

    'form' => [
        'password-email-title' => 'Сброс пароля',
        'password-email-placeholder' => 'Email',
        'password-email-description' => 'In your email you will receive a letter containing a link to reset your password. Reference lifetime is 10 minutes.',
        'password-form-title' => 'Password reset',
        'password-password-placeholder' => 'Password',
        'password-confirmation-placeholder' => 'Retype password',
    ],

    'button' => [
        'password-email-submit' => 'Сброс пароля',
        'password-form-submit' => 'Сброс пароля',
    ],

    'notification' => [
        'password-email-error' => 'С предыдущего запроса прошло менее :minutes минут. Пожалуйста, повторите попытку позже.',
        'password-email-success' => 'Письмо успешно отправленно. Пожалуйста, проверьте ваш ящик эл.почты',
        'password-form-error' => 'Ссылка по которой вы перешли более не активна',
        'password-form-success' => 'Пароль успешно изменен',
        'password-form-unknown-error' => 'Произошла неизвестная ошибка. Пожалуйста, повторите попытку позже.',
    ],

];
