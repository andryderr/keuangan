<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetugasMedis extends Model
{
    protected $table = "petugas_medis";

    public $timestamps = false;
    
    function job(){
    	return $this->belongsTo('App\JobPetugas','id_job_petugas','id_job_petugas');
    }
}
