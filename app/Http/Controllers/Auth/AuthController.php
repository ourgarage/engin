<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
//    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct()
    {
        \Title::prepend('Admin');
    }

    public function logout()
    {
        \Auth::guard('web')->logout();
        
        return redirect()->guest(route('login'));
    }

    public function login()
    {
        \Title::append('Login');

        return view('auth.login');
    }

    public function loginPost()
    {
        \Auth::attempt(request()->only(['email', 'password']), request('remember'));

        return redirect()->route('index-admin');
    }

    public function showRegistrationForm()
    {
        \Title::append('Register');

        return view('auth.register');
    }
}
