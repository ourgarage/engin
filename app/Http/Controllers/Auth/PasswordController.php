<?php

namespace App\Http\Controllers\Auth;

use App\Classes\MailClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordResetPostRequest;
use App\Models\UserHelp;
use Jenssegers\Date\Date;
use Notifications;

class PasswordController extends Controller
{

    public function __construct()
    {
        \Title::prepend('Admin');
    }

    public function showResetForm($email= null, $token  = null)
    {
        if (is_null($token) || is_null($email)) {
            \Title::append('Password reset');

            return view('auth.passwords.email');
        }


    }

    public function sendResetLinkEmail(UserPasswordResetPostRequest $errors, UserHelp $help)
    {
        $lastHelp = $help->where('email', request('email'))->first();

        $token = str_random();

        if ($lastHelp) {
            if($lastHelp->psw_reset >= Date::now()->subHours('12')){
                Notifications::danger('С предыдущего запроса прошло менее ХХ часов, попробуйте позже.', 'page');

                return redirect()->route('login');
            } else {
                $help->update([
                    'token' => $token,
                    'psw_reset' => Date::now()
                ]);

                return $this->sendEmailAndRedirect(request('email'), $token);
            }
        }

        $help->create([
            'email' => request('email'),
            'token' => $token,
            'psw_reset' => Date::now()
        ]);

        return $this->sendEmailAndRedirect(request('email'), $token);
    }

    protected function sendEmailAndRedirect($email, $token)
    {
        $mailClass = new MailClass();

        $mailClass->passwordReset($email, $token);

        Notifications::success('Success. Check your mailbox', 'alert');

        return redirect()->route('index');
    }

}
