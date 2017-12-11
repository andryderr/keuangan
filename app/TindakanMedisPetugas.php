<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TindakanMedisPetugas extends Model
{
    protected $table = 'tm_p';
    public $timestamps = false;

    public function petugas(){
    	return $this->belongsTo('App\PetugasMedis','id_petugas','id_petugas_medis');
    }
}
