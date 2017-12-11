<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailStokAwal extends Model
{
    protected $table = 'detail_stokawal';
    public $timestamps = false;

    public function stokawal(){
    	return $this->belongsTo('App\StokAwal','id_stokawal','id_stokawal');
    }

    public function barang(){
    	return $this->belongsTo('App\Barang','id_barang','id_barang');
    }
}
