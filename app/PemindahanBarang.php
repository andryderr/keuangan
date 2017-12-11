<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemindahanBarang extends Model
{
    protected $table = 'pemindahan_barang';

    public $timestamps= false;

    public function gudangawal(){
		return $this->belongsTo('App\Gudang','id_gudang_awal','id_gudang');
	}

	  public function gudangtujuan(){
		return $this->belongsTo('App\Gudang','id_gudang_tujuan','id_gudang');
	}
}
