<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemindahanBarang extends Model
{
    protected $table  = 'detail_pemindahan_barang';
    public $timestamps = false;

      public function barang(){
    	return $this->belongsTo('App\Barang','id_barang','id_barang');
    }
}
