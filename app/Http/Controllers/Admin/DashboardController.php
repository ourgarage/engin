<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Notifications;
use Auth;

class DashboardController extends Controller
{

    private $user;

    public function __construct()
    {
        $this->user = Auth::user();

        \Title::prepend(trans('dashboard.title.prepend'));
    }

    public function index()
    {
        \Title::append(trans('dashboard.title.index'));

        return view('admin.dashboard.index', ['user' => $this->user]);
    }

    public function usersManage(User $user)
    {
        $admins = $user->orderBy('updated_at', 'desc')->take(20)->get();

        \Title::append(trans('dashboard.title.users-manage'));

        return view('admin.dashboard.users-manage', ['user' => $this->user, 'admins' => $admins]);
    }

}
