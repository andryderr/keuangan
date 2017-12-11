<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailReturPembelian extends Model
{
    protected $table = "detail_retur_pembelian";

    public $timestamps = false;

       public function returPembelian(){
   		return $this->belongsTo("App\ReturPembelian","id_retur","id_retur");
   	}

   		public function barang(){
		return $this->belongsTo("App\Barang",'id_barang','id_barang');
	}
}


