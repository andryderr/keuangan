<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemeriksaan extends Model
{
	protected $table = "detail_pemeriksaan";

	public $timestamps = false;

	function JenisPemeriksaan(){
		return $this->belongsTo('App\JenisPemeriksaan','id_jenis_pemeriksaan','id_jenis_pemeriksaan');
	}
	function hasilPemeriksaan(){
		return $this->hasMany('App\HasilPemeriksaan','id_detail_pemeriksaan','id_detail_pemeriksaan');
	}
}
