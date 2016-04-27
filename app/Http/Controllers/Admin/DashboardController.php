<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        \Title::prepend('Admin');
    }

    public function index()
    {
        \Title::append('General');

        return view('admin.dashboard.index');
    }

}
