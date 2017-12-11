<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    public $table = "rekomendasi";

    function jenis_barang(){
    	return $this->belongsTo('App\JenisBarang','id_jenis_barang','id_jenis_barang');
    }
}
