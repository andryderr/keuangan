<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturPembelian extends Model
{
	protected $table = "retur_pembelian";
	public $timestamps = false;

	public function sup(){
		return $this->belongsTo("App\Supplier",'id_supplier','id_supplier');
	}

	public function pem(){
		return $this->belongsTo("App\Pembelian",'id_pembelian_barang','id_pembelian_barang');
	}

	   public function detRetPem(){
   		return $this->hasMany("App\DetailReturPembelian","id_retur","id_retur");
   	}
}
