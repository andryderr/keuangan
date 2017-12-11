<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSubMedisKelas extends Model
{
    protected $table = "detail_sub_medis_kelas";
    public $timestamps = false;

    function jasa(){
    	return $this->belongsTo('App\SubJasa','id_sub_jasa','id_sub_jasa');
    }
}
