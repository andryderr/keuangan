<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewPermintaanResep extends Model
{
    protected $table = 'view_permintaan_resep';

    function detail_pendaftaran(){
    	return $this->belongsTo('App\DetailPendaftaran','id_detail_pendaftaran','id_detail_pendaftaran');
    }
    function resep(){
    	return $this->belongsTo('App\Resep','id_resep','id_resep');
    }
    function dokter(){
    	return $this->belongsTo('App\Dokter','id_dokter','id_dokter');
    }
}
