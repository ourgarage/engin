<?php

namespace App\Http\Controllers\Auth;

use App\Classes\MailSend;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetSendEmailPostRequest;
use App\Http\Requests\PasswordResetUpdateDataPostRequest;
use App\Models\User;
use Jenssegers\Date\Date;
use Notifications;

class PasswordController extends Controller
{

    private $password_reset_limit = 10; //Minutes

    public function __construct()
    {
        \Title::prepend(trans('password.title.prepend'));
    }

    public function showSendEmailForResetForm()
    {
        \Title::append(trans('password.title.password-email'));

        return view('admin.auth.passwords.email');
    }

    public function sendResetLinkEmail(PasswordResetSendEmailPostRequest $errors, User $user, MailSend $mailSend)
    {
        $user = $user->where('email', request('email'))->first();

        $token = str_random();

        if ($user->last_restore > Date::now()->subMinutes($this->password_reset_limit)) {
            Notifications::danger(trans('password.notification.password-email-error', ['minutes' => $this->password_reset_limit]), 'page');

            return redirect()->back()->withInput();
        } else {
            $user->update([
                'token' => $token,
                'last_restore' => Date::now()
            ]);

            $mailSend->passwordReset(request('email'), $token);

            Notifications::success(trans('password.notification.password-email-success'), 'top');

            return redirect()->route('login');
        }
    }

    public function showResetForm($email, $token, User $user)
    {
        $user = $user->where('email', $email)
            ->where('token', $token)
            ->first();

        if (!is_null($user) && $user->last_restore > Date::now()->subMinutes($this->password_reset_limit)) {
            \Title::append(trans('password.title.password-form'));

            return view('admin.auth.passwords.reset', ['token' => $token]);
        } else {
            Notifications::error(trans('password.notification.password-form-error'), 'top');

            return redirect()->route('login');
        }
    }

    public function resetPost(PasswordResetUpdateDataPostRequest $errors, User $user)
    {
        $user = $user->where('email', request('email'))
            ->where('token', request('token'))
            ->first();

        if (!is_null($user)) {
            $user->update([
                'token' => str_random(),
                'password' => bcrypt(request('password'))
            ]);

            Notifications::success(trans('password.notification.password-form-success'), 'top');

            return redirect()->route('login');
        } else {
            Notifications::error(trans('password.notification.password-form-unknown-error'), 'top');

            return redirect()->route('login');
        }

    }

}
