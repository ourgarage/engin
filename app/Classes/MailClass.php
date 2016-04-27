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


}
