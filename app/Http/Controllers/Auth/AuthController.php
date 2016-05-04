<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Notifications;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        \Title::prepend(trans('auth.title.prepend'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->guest(route('login'));
    }

    public function login()
    {
        \Title::append(trans('auth.title.login'));

        return view('auth.login');
    }

    public function loginPost()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')], request('remember'))) {
            Notifications::success(trans('auth.notification.login-success'), 'top');

            return redirect()->route('index-admin');
        } else {
            Notifications::error(trans('auth.notification.login-error'), 'page');

            return redirect()->back()->withInput();
        }
    }

}
