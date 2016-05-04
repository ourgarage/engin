<?php

namespace App\Classes;

use Mail;

class MailSend
{

    public function passwordReset($email, $token)
    {
        Mail::queue(['emails.admin.password-reset-html', 'emails.admin.password-reset-text'],
            ['email' => $email, 'token' => $token], function ($m) use ($email) {

            $m->to($email)->subject(trans('email.password-reset.subject'));
        });
    }


}
