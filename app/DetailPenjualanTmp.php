<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualanTmp extends Model
{
    protected $table = "detail_penjualan_tmp";

    public $timestamps = false;

    public function penjualan(){
   		return $this->belongsTo("App\Penjualan","id_penjualan_barang","id_penjualan_barang");
   	}

   	public function barang()
   	{
   		return $this->belongsTo("App\Barang", "id_barang", "id_barang");
   	}

}
