<?php

namespace App\Classes;

use Mail;

class MailClass
{

    public function register($user)
    {
        $data = ['token' => $user->hash];

        $adresat = ['email' => $user->email];

        Mail::queue(['emails.admin.register-html', 'emails.admin.register-text'], $data,
            function ($message) use ($adresat) {
                $message->to($adresat['email'])->subject('Register');
            });
    }


}
