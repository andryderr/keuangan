<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailMedisKelas extends Model
{
	protected $table = "detail_medis_kelas";
	public $timestamps = false;

	public function dokter(){
		return $this->hasMany('App\TindakanMedisDokter','id_detail_medis_kelas','id_detail_medis_kelas');
	}
	public function petugas(){
		return $this->hasMany('App\TindakanMedisPetugas','id_detail_medis_kelas','id_detail_medis_kelas');
	}
	public function tindakanMedis(){
		return $this->belongsTo('App\TindakanMedis','id_tm_d_p','id_tm_d_p');
	}
	public function kelas(){
		return $this->belongsTo('App\Kelas','id_kelas','id_kelas');
	}
	public function detail(){
		return $this->hasMany('App\DetailSubMedisKelas','id_detail_medis_kelas','id_detail_medis_kelas');
	}
}
