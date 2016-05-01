<?php

namespace App\Http\Controllers\Auth;

use App\Classes\MailClass;
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

    public function showResetForm($email = null, $token = null)
    {
        if (is_null($token) && is_null($email)) {
            \Title::append('Password reset');

            return view('auth.passwords.email');
        }

        $help = UserHelp::where('email', $email)
            ->where('token', $token)
            ->with('user')
            ->first();

        if ($help && $help->psw_reset > Date::now()->subHour()) {
            \Title::append('Password reset');

            return view('auth.passwords.reset', ['token' => $token]);
        } else {
            Notifications::error('Ссылка, по которой вы перешли, не действительна', 'top');

            return redirect()->route('index');
        }
    }

    public function sendResetLinkEmail(PasswordResetSendEmailPostRequest $errors, UserHelp $help)
    {
        $lastHelp = $help->where('email', request('email'))->first();

        $token = str_random();

        if ($lastHelp) {
            if ($lastHelp->psw_reset > Date::now()->subHours('12')) {
                Notifications::danger('С предыдущего запроса прошло менее ХХ часов, попробуйте позже.', 'page');

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
        $mailClass = new MailClass();

        $mailClass->passwordReset($email, $token);

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

        Notifications::success('Пароль успешно изменен', 'top');

        return redirect()->route('login');
    }

}
