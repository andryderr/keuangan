<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailAkun extends Model
{
    protected $table = 'detail_akun';
    public $timestamps = false;
	
	public function detailAkun(){
		return $this->belongsTo('App\Akun','id_akun','id_akun');
	}    
}
