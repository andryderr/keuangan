<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
	protected $table = 'piutang';
	public $timestamps = false;

	public function akun(){
		return $this->belongsTo('App\Akun','id_akun','id_akun');
	}

	public function supplier(){
    	return $this->belongsTo('App\Supplier','id_supplier','id_supplier');
    }

    public function cust()
    {
    	return $this->belongsTo('App\Customer','id_customer','id_customer');
    }

     public function pendaftaran(){
    	return $this->belongsTo('App\Pendaftaran','id_pendaftaran','id_pendaftaran');
    }
}
