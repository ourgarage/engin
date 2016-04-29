<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

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

    public function loginPost(\Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']), request()->has('remember'))) {
            if ($request->ajax() || $request->wantsJson()) {
                return new JsonResponse(['Not authorized'], 403);
            }

            //@todo: add notification
            return redirect(null, 403)->route('login');
        }

        //@todo: Add notification

        return redirect()->route('index-admin');
    }

    public function showRegistrationForm()
    {
        \Title::append('Register');

        return view('auth.register');
    }
}
