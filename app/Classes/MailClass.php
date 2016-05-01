<?php

namespace App\Classes;

use Mail;

class MailClass
{

    public function register($user, $token)
    {
        Mail::queue(['emails.admin.register-html', 'emails.admin.register-text'],
            ['user' => $user, 'token' => $token], function ($m) use ($user) {

            $m->to($user->email, $user->name)->subject('Register');
        });
    }

    public function passwordReset($email, $token)
    {
        Mail::queue(['emails.admin.password-reset-html', 'emails.admin.password-reset-text'],
            ['email' => $email, 'token' => $token], function ($m) use ($email) {

            $m->to($email)->subject('Password reset');
        });
    }


}
