<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaan extends Model
{
    protected $table = "hasil_pemeriksaan";

    public $timestamps = false;

    function DetailJenisPemeriksaan(){
    	return $this->hasMany('App\DetailJenisPemeriksaan','id_detail_jenis_pemeriksaan','id_detail_jenis_pemeriksaan');
    }
}
