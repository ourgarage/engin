<?php

namespace App\Listeners;

use App\Events\PasswordReset;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class EmailSendPasswordResetLink
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PasswordReset  $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        $email = $event->user->email;
        $token = $event->user->token;

        Mail::queue('emails.admin.password-reset', ['email' => $email, 'token' => $token], function ($m) use ($email) {
            $m->to($email)->subject(trans('email.password-reset.subject'));
        });
    }
}
