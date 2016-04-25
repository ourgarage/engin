<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.pages.index');
    }

    public function getTest1234()
    {
        $user = \App\Models\User::find(2);
        return view('emails.admin.register-html', ['user' => $user]);
    }
}
