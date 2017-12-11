<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTindakanMedis extends Model
{
    protected $table = "detail_tindakan_medis";

    public $timestamps = false;

    public function dokter(){
    	return $this->hasMany('App\NTindakanMedisDokter','id_detail_tindakan_medis','id_detail_tindakan_medis');
    }

    public function petugas(){
    	return $this->hasMany('App\NTindakanMedisPetugas','id_detail_tindakan_medis','id_detail_tindakan_medis');
    }

    public function tm(){
    	return $this->belongsTo('App\DetailMedisKelas','id_detail_medis_kelas','id_detail_medis_kelas');
    }

    public function det_pendaftaran(){
        return $this->belongsTo('App\DetailPendaftaran','id_detail_pendaftaran','id_detail_pendaftaran');
    }
    public function tindakanKelas(){
        return $this->belongsTo('App\DetailMedisKelas','id_detail_medis_kelas','id_detail_medis_kelas');
    }

    // public 
}
