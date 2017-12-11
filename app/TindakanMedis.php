<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TindakanMedis extends Model
{
    protected $table = 'tm_d_p';
    public $timestamps = false;
    protected $primaryKey = 'id_tm_d_p';

    public function dokter(){
    	return $this->hasMany('App\TindakanMedisDokter','id_tm_d_p','id_tm_d_p');
    }
    public function petugas(){
    	return $this->hasMany('App\TindakanMedisPetugas','id_tm_d_p','id_tm_d_p');
    }
    public function detail(){
    	return $this->hasMany('App\DetailMedisKelas','id_tm_d_p','id_tm_d_p');
    }
}
