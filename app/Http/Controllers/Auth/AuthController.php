<?php

namespace App\Http\Controllers\Auth;

use App\Classes\MailClass;
use App\Http\Requests\UserRegisterPostRequest;
use App\Models\User;
use Notifications;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;
use Illuminate\Support\Facades\Auth;

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

        return view('auth.register-complete');
    }

    public function loginPost()
    {
        Auth::attempt(request()->only(['email', 'password']), request('remember'));

        return redirect()->route('index-admin');
    }

    public function showRegistrationForm()
    {
        \Title::append('Register');

        return view('auth.register');
    }

    public function registerPost(Request $request, MailClass $mailClass)
    {
//        UserRegisterPostRequest $errors,
        $user = User::create([
                'name' => $request::get('name'),
                'email' => $request::get('email'),
                'password' => bcrypt($request::get('password')),
                'hash' => randomString()
        ]);

        if (!$user instanceof Model) {

            $mailClass->register($user);

            Notifications::success('Success');

//        Auth::guard($this->getGuard())->login($this->create($request->all()));
//        Auth::attempt(request()->only(['email', 'password']), request('remember'));

            return redirect()->route('registration-complete');

        } else {

            Notifications::error('Error. Please try later');

            return redirect()->back()->withInput();

        }

    }

}
