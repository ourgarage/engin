<?php

namespace App\Http\Controllers\Auth;

use App\Classes\MailClass;
use App\Http\Requests\ResendRegisterConfirmEmailPostRequest;
use App\Http\Requests\UserRegisterPostRequest;
use App\Models\RegisterConfirm;
use App\Models\User;
use Notifications;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;

class AuthController extends Controller
{
//    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct()
    {
        \Title::prepend('Admin');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->guest(route('login'));
    }

    public function login()
    {
        \Title::append('Login');

        return view('auth.login');
    }

    public function loginPost()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'status' => 'active'], request('remember'))) {
            Notifications::success('Successfully login');

            return redirect()->route('index');
        } else {
            Notifications::danger('<p>Access error. The reasons may be incorrect email password pair or unconfirmed registration</p>
                <p>Please use the <a href="' . route('password-reset') . '">password reset service</a> or <a href="javascript:void(0)" id="resendConfirmEmail">re-sending an email to confirm your registration</a></p>');

            return redirect()->back()->withInput();
        }
    }

    public function showRegistrationForm()
    {
        \Title::append('Register');

        return view('auth.register');
    }

    public function registerPost(UserRegisterPostRequest $errors, MailClass $mailClass)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'hash' => randomString()
        ]);

        if (!$user instanceof Model) {

            $mailClass->register($user);

            Notifications::success('Success');

            return redirect()->route('registration-complete');

        } else {

            Notifications::error('Error. Please try later');

            return redirect()->back()->withInput();

        }

    }

    public function registerResendConfirmEmailPost(ResendRegisterConfirmEmailPostRequest $error, User $user, RegisterConfirm $confirm, MailClass $mailClass)
    {
        $user = $user::where('email', request('email'))->with('confirm')->first();

        if ($user->confirm) {
            if ($user->confirm->updated_at >= Date::now()->subHours('12')) {
                Notifications::danger('You recently have used this service. Wait a few hours before the next attempt. If you have not received a letter, it is recommended to check the folder "Spam" your mailbox');

                return redirect()->back()->withInput();
            }

            $user->update(['hash' => randomString()]);

            $user->confirm()->touch();
        }

        $confirm->create(['email' => request('email')]);

        $mailClass->register($user);

        Notifications::success('Success. Check your mailbox');

        return redirect()->route('index');
    }

}
