<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password','id_poli','username',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function poli(){
        return $this->belongsTo('App\Poli','id_poli','id_poli');
    }
}
