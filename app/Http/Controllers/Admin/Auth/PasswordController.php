<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Events\PasswordReset;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetSendEmailRequest;
use App\Http\Requests\PasswordResetUpdateDataRequest;
use App\Models\User;
use Jenssegers\Date\Date;
use Notifications;

class PasswordController extends Controller
{

    public function __construct()
    {
        \Title::prepend(trans('password.title.prepend'));
    }

    public function showSendEmailForResetForm()
    {
        \Title::append(trans('password.title.password-email'));

        return view('admin.auth.passwords.email');
    }

    public function sendResetLinkEmail(PasswordResetSendEmailRequest $errors, User $user)
    {
        $user = $user->where('email', request('email'))->first();

        $token = str_random();

        if ($user->last_restore > Date::now()->subMinutes(config('project.password_reset_limit'))) {
            Notifications::danger(trans_choice('password.notification.password-email-error', config('project.password_reset_limit'), ['minutes' => config('project.password_reset_limit')]), 'page');

            return redirect()->back()->withInput();
        } else {
            $user->update([
                'token' => $token,
                'last_restore' => Date::now()
            ]);

            event(new PasswordReset($user));

            Notifications::success(trans('password.notification.password-email-success'), 'top');

            return redirect()->route('login');
        }
    }

    public function showResetForm($email, $token, User $user)
    {
        $user = $user->where('email', $email)
            ->where('token', $token)
            ->first();

        if (!is_null($user) && $user->last_restore > Date::now()->subMinutes(config('project.password_reset_limit'))) {
            \Title::append(trans('password.title.password-form'));

            return view('admin.auth.passwords.reset', ['token' => $token]);
        } else {
            Notifications::error(trans('password.notification.password-form-error'), 'top');

            return redirect()->route('login');
        }
    }

    public function resetPost(PasswordResetUpdateDataRequest $errors, User $user)
    {
        $user = $user->where('email', request('email'))
            ->where('token', request('token'))
            ->first();

        if (!is_null($user)) {
            $user->update([
                'token' => str_random(),
                'password' => request('password')
            ]);

            Notifications::success(trans('password.notification.password-form-success'), 'top');

            return redirect()->route('login');
        } else {
            Notifications::error(trans('password.notification.password-form-unknown-error'), 'top');

            return redirect()->route('login');
        }

    }

}
