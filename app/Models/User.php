<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'status', 'token', 'last_restore'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    
    const ROLE_SUPERADMIN = 'superadmin';
    const ROLE_ADMIN = 'admin';

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
