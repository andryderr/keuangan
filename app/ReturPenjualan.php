<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturPenjualan extends Model
{
	protected $table = "retur_penjualan";

	public $timestamps = false;

	public function cust(){
		return $this->belongsTo("App\Customer",'id_customer','id_customer');
	}

	public function pen(){
		return $this->belongsTo("App\Penjualan",'id_penjualan_barang','id_penjualan_barang');
	}
	
	public function detRetPen(){
		return $this->hasMany("App\DetailReturPenjualan","id_retur_pen","id_retur_pen");
	}
}
