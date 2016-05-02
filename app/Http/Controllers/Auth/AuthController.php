<?php

namespace App\Http\Controllers\Auth;

use App\Classes\MailSend;
use App\Http\Requests\ResendRegisterConfirmEmailPostRequest;
use App\Http\Requests\UserRegisterPostRequest;
use App\Models\User;
use App\Models\UserHelp;
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
            Notifications::success('Logged in successfully', 'top');

            return redirect()->route('index');
        } else {
            Notifications::error('Access error. The reasons may be incorrect email password pair or unconfirmed registration<br>
                Please use the <a href="' . route('password-reset.email') . '">password reset service</a> or <a href="javascript:void(0)" 
                id="resendConfirmEmail">re-sending an email to confirm your registration</a>', 'page');

            return redirect()->back()->withInput();
        }
    }

    public function showRegistrationForm()
    {
        \Title::append('Register');

        return view('auth.register');
    }

    public function registerPost(UserRegisterPostRequest $errors, MailSend $mailSend, UserHelp $help)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        if (is_null($user)) {
            Notifications::error('Error. Please try later', 'top');

            return redirect()->back()->withInput();
        } else {
            $help = $help->create([
                'email' => $user->email,
                'token' => str_random(),
                'reg_confirm' => Date::now()
            ]);

            $mailSend->register($user, $help->token);

            Notifications::success('Success. Check your mailbox', 'top');

            return redirect()->route('index');
        }

    }

    public function registerResendConfirmEmailPost(ResendRegisterConfirmEmailPostRequest $errors, User $user, UserHelp $help, MailSend $mailSend)
    {
        $user = $user->with('userHelp')
            ->where('email', request('email'))
            ->first();

        $token = str_random();

        if (!is_null($user->userHelp)) {
            if ($user->userHelp->reg_confirm >= Date::now()->subHours('12')) {
                Notifications::danger('You recently have used this service. Wait a few hours before the next attempt. 
                If you have not received a letter, it is recommended to check the folder "Spam" in your mailbox', 'page');

                return redirect()->back()->withInput();
            }

            $user->userHelp()->update([
                'token' => $token,
                'reg_confirm' => Date::now()
            ]);
        } else {
            $help->create([
                'email' => request('email'),
                'token' => $token,
                'reg_confirm' => Date::now()
            ]);
        }

        $mailSend->register($user, $token);

        Notifications::success('Success. Please check your mailbox', 'top');

        return redirect()->route('login');
    }

    public function registerConfirmation($email, $token, UserHelp $help)
    {
        $help = $help->with('user')
            ->where('token', $token)
            ->where('email', $email)
            ->first();

        if (!is_null($help) && $help->reg_confirm >= Date::now()->subHours('24') && $help->user->status == User::STATUS_PENDING) {
            $help->user()->update(['status' => User::STATUS_ACTIVE]);

            Auth::login($help->user);

            Notifications::success('You successfully confirmed your registration', 'top');
        }

        Notifications::error('Error. Perhaps this link is no longer valid. On the login page you can request a follow-up letter to confirm your registration', 'page');

        return redirect()->route('index');
    }

}
