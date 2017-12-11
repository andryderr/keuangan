<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    protected $table = "detail_pembelian";

    public $timestamps = false;

    public function pembelian(){
   		return $this->belongsTo("App\Pembelian", "id_pembelian_barang", "id_pembelian_barang");
   	}

   	public function barang()
   	{
   		return $this->belongsTo("App\Barang", "id_barang", "id_barang");
   	}
}
