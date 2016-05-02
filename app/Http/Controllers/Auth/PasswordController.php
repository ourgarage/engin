<?php

namespace App\Http\Controllers\Auth;

use App\Classes\MailSend;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetSendEmailPostRequest;
use App\Http\Requests\PasswordResetUpdateDataPostRequest;
use App\Models\User;
use App\Models\UserHelp;
use Jenssegers\Date\Date;
use Notifications;

class PasswordController extends Controller
{

    public function __construct()
    {
        \Title::prepend('Admin');
    }

    public function showSendEmailForResetForm()
    {
        \Title::append('Password reset');

        return view('auth.passwords.email');
    }

    public function showResetForm($email, $token)
    {
        $help = UserHelp::with('user')
            ->where('email', $email)
            ->where('token', $token)
            ->first();

        if ($help && $help->psw_reset > Date::now()->subHour()) {
            \Title::append('Password reset');

            return view('auth.passwords.reset', ['token' => $token]);
        } else {
            Notifications::error('The link you followed is invalid', 'top');

            return redirect()->route('index');
        }
    }

    public function sendResetLinkEmail(PasswordResetSendEmailPostRequest $errors, UserHelp $help)
    {
        $lastHelp = $help->where('email', request('email'))->first();

        $token = str_random();

        if (!is_null($lastHelp)) {
            if ($lastHelp->psw_reset > Date::now()->subHours('12')) {
                Notifications::danger('it took less than 12 hours With previous request, try again later.', 'page');

                return redirect()->route('login');
            } else {
                $lastHelp->update([
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
        $mailSend = new MailSend();

        $mailSend->passwordReset($email, $token);

        Notifications::success('Success. Check your mailbox', 'top');

        return redirect()->route('index');
    }

    public function resetPost(PasswordResetUpdateDataPostRequest $errors, UserHelp $help, User $user)
    {
        $help->where('email', request('email'))
            ->where('token', request('token'))
            ->update([
                'token' => str_random()
            ]);

        $user->where('email', request('email'))->update([
            'password' => bcrypt(request('password'))
        ]);

        Notifications::success('Password successfully changed', 'top');

        return redirect()->route('login');
    }

}
