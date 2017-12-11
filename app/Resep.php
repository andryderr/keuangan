<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    public $table = "resep";
    public $timestamps = false;

    public function dokter(){
    	return $this->belongsTo("App\Dokter",'id_dokter','id_dokter');
    }

     public function pendaftaran(){
    	return $this->belongsTo("App\Pendaftaran",'id_pendaftaran','id_pendaftaran');
    }

     public function penjualanBarang(){
    	return $this->belongsTo("App\Penjualan",'id_resep','id_resep');
    }
}
