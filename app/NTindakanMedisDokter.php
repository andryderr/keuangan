<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NTindakanMedisDokter extends Model
{
    protected $table = "n_tm_d";
    public $timestamps = false;

    public function dokter(){
    	return $this->belongsTo('App\Dokter','id_dokter','id_dokter');
    }

    public function det_tindakan(){
    	return $this->belongsTo('App\DetailTindakanMedis','id_detail_tindakan_medis','id_detail_tindakan_medis');
    }
}
