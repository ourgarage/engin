<?php

namespace App\Http\Controllers\Admin;

use App\Events\PasswordReset;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Notifications;

class UsersController extends Controller
{
    public function __construct()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $admins = $user->orderBy('updated_at', 'desc')->paginate(20);

        \Title::append(trans('users.title.index'));

        return view('admin.users.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        \Title::append(trans('users.title.create'));

        return view('admin.users.user');
    }

    /**
     * Store a newly created or updated resource in storage.
     */
    public function store(Requests\AdminCreateRequest $errors, $id = null)
    {
        if (is_null($id)) {
            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => request('password'),
            ]);

            Notifications::success(trans('users.notification.user-created-success'), 'top');
        } else {
            $user = User::find($id);

            $user->name = request('name');
            $user->email = request('email');

            if (request()->has('change_password')) {
                $user->password = request('password');
            }

            $user->save();

            Notifications::success(trans('users.notification.user-update'), 'top');
        }

        return redirect()->route('admin-users-index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, User $user)
    {
        $admin = $user->find($id);

        \Title::append(trans('users.title.edit'));

        return view('admin.users.user', ['admin' => $admin]);
    }

    public function updateStatus($id, User $user)
    {
        $user = $user->find($id);

        $user->update([
            'status' => $user->status == User::STATUS_ACTIVE ? User::STATUS_INACTIVE : User::STATUS_ACTIVE,
        ]);

        Notifications::success(trans('users.notification.status-change-update'), 'top');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);

        Notifications::success(trans('users.notification.user-delete'), 'top');

        return redirect()->back();
    }

    public function searchUsers(User $user)
    {
        if (!is_null(request('q'))) {
            $admins = $user->where('email', 'LIKE', '%' . e(request('q')) . '%')
                ->orWhere('name', 'LIKE', '%' . e(request('q')) . '%')->paginate(20);
        }

        \Title::append(trans('users.title.search'));

        return view('admin.users.search', ['admins' => $admins, 'searchValue' => request('email')]);
    }
}
