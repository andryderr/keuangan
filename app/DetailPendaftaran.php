<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPendaftaran extends Model
{
    protected $table = "detail_pendaftaran";
    public $timestamps = false;

    public function pendaftaran(){
    	return $this->belongsTo('App\Pendaftaran','id_pendaftaran','id_pendaftaran');
    }

    public function poli(){
    	return $this->belongsTo('App\Poli','id_poli','id_poli');
    }


    public function tindakanMedis(){
    	return $this->hasMany('App\DetailTindakanMedis','id_detail_pendaftaran','id_detail_pendaftaran');
    }

    public function det_diagnosa(){
        return $this->hasMany('App\DetailDiagnosa','id_detail_pendaftaran','id_detail_pendaftaran');
    }

    public function det_kamar(){
        return $this->hasMany('App\DetailKamarInap','id_detail_pendaftaran','id_detail_pendaftaran');
    }

    public function det_gizi(){
        return $this->hasMany("App\Rekomendasi",'id_detail_pendaftaran','id_detail_pendaftaran');
    }
    
    function pemeriksaan(){
        return $this->hasMany('App\Pemeriksaan','id_detail_pendaftaran','id_detail_pendaftaran');
    }
}
