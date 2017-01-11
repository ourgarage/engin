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
        'password-email-description' => 'На ваш эл.адрес отправлено письмо содержащее ссылку для сброса пароля. Срок службы ссылки составляет 10 минут.',
        'password-form-title' => 'Сброс пароля',
        'password-password-placeholder' => 'Пароль',
        'password-confirmation-placeholder' => 'Повтор пароля',
    ],

    'button' => [
        'password-email-submit' => 'Сброс пароля',
        'password-form-submit' => 'Сброс пароля',
    ],

    'notification' => [
        'password-email-error' => '{1} С предыдущего запроса прошло менее :minutes минуты. Пожалуйста, повторите попытку позже.|[2,Inf] С предыдущего запроса прошло менее :minutes минут. Пожалуйста, повторите попытку позже.',
        'password-email-success' => 'Письмо успешно отправленно. Пожалуйста, проверьте ваш ящик эл.почты',
        'password-form-error' => 'Ссылка по которой вы перешли более не активна',
        'password-form-success' => 'Пароль успешно изменен',
        'password-form-unknown-error' => 'Произошла неизвестная ошибка. Пожалуйста, повторите попытку позже.',
    ],

];
