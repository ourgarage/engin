<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    const STATUS_PENDING = 'pending';

    const STATUS_ACTIVE = 'active';

    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userHelp()
    {
        return $this->hasOne('App\Models\UserHelp', 'email', 'email');
    }

}
