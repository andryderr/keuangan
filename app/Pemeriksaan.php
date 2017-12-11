<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
	protected $table = "pemeriksaan";
	public $timestamps = false;

	function DetailPemeriksaan(){
		return $this->hasMany('App\DetailPemeriksaan','id_pemeriksaan','id_pemeriksaan');
	}

	function detailPendaftaran(){
		return $this->belongsTo('App\DetailPendaftaran','id_detail_pendaftaran','id_detail_pendaftaran');
	}
}
