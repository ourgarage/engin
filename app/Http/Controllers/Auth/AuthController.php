<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Notifications;
use Auth;
use Illuminate\Http\JsonResponse;

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
        if (!Auth::attempt(request()->only(['email', 'password']), request()->has('remember'))) {
            if (request()->ajax() || request()->wantsJson()) {
                return new JsonResponse(['Not authorized'], 403);
            }

            Notifications::error(trans('auth.notification.login-error'), 'page');

            return redirect(null, 403)->route('login');
        }

        Notifications::success(trans('auth.notification.login-success'), 'top');

        return redirect()->route('index-admin');
    }

}
