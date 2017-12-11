<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $fillable = [
    'name', 'email', 'password',
    ];

    protected $hidden = [
    'password', 'remember_token',
    ];

    protected $table = "users";

    public $timestamps = false;
}
