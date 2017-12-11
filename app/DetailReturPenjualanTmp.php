<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailReturPenjualanTmp extends Model
{
    protected $table = "detail_retur_penjualan_tmp";

    public $timestamps = false;

       public function returPenjualan(){
   		return $this->belongsTo("App\ReturPembelian","id_retur_pen","id_retur_pen");
   	}

   		public function barang(){
		return $this->belongsTo("App\Barang",'id_barang','id_barang');
	}
}
