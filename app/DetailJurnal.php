<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailJurnal extends Model
{
    protected $table = "detail_jurnal";

    public $timestamps = false;

    public function akun()
    {
    	return $this->belongsTo('App\MasterAkun', 'no_akun', 'no_akun');
    }
}
