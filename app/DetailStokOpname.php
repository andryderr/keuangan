<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailStokOpname extends Model
{
    protected $table = "detail_stok_opname";

    public $timestamps = false;

    public function barang()
    {
    	return $this->belongsTo('App\Barang', 'id_barang', 'id_barang');
    }

    public function stokOpname()
    {
    	return $this->belongsTo('App\StokOpname', 'id_stok_opname', 'id_stok_opname');
    }
}
