<?php

namespace App\Classes;

use Mail;

class MailSend
{

    public function passwordReset($email, $token)
    {
        Mail::queue(['admin.emails.password-reset-html', 'admin.emails.password-reset-text'],
            ['email' => $email, 'token' => $token], function ($m) use ($email) {

            $m->to($email)->subject(trans('email.password-reset.subject'));
        });
    }


}
