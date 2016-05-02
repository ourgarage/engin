<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHelp extends Model
{

    protected $table = 'user_help_requests';

    protected $fillable = [
        'email', 'token', 'reg_confirm', 'psw_reset'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'email', 'email');
    }

}
