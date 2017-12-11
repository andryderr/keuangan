<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = "dokter";

    public $timestamps = false;
    
    function poli(){
    	return $this->belongsTo('App\Poli','id_poli','id_poli');
    }
    function job(){
    	return $this->belongsTo('App\JobDokter','id_job_dokter','id_job_dokter');
    }
}
