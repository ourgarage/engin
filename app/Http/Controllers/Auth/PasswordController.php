<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{

//    use ResetsPasswords;

    public function __construct()
    {
        \Title::prepend('Admin');
    }

    public function showResetForm($token = null, $email = null)
    {
        if (is_null($token) || is_null($email)) {
            \Title::append('Password reset');

            return view('auth.passwords.email');
        }

        
    }

}
