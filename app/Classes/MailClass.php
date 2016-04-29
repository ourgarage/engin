<?php

namespace App\Classes;

use Mail;

class MailClass
{

    public function register($user, $hash)
    {
        Mail::queue(['emails.admin.register-html', 'emails.admin.register-text'],
            ['user' => $user, 'hash' => $hash], function ($m) use ($user) {

            $m->to($user->email, $user->name)->subject('Register');

        });
    }

    public function passwordReset($email, $hash)
    {
        Mail::queue(['emails.admin.password-reset-html', 'emails.admin.password-reset-text'],
            ['email' => $email, 'hash' => $hash], function ($m) use ($email) {

                $m->to($email)->subject('Password reset');

            });
    }


}
