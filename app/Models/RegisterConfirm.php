<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterConfirm extends Model
{

    protected $fillable = [
        'email', 'hash'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'email', 'email');
    }

}
