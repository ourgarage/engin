<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Notifications;

class DashboardController extends Controller
{

    public function __construct()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
    }

    public function index()
    {
        \Title::append(trans('dashboard.title.index'));


        return view('admin.dashboard.index');
    }

}
