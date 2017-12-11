<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TindakanMedisDokter extends Model
{
    protected $table = "tm_d";
    protected $primaryKey = "id_tm_d";
    public $timestamps = false;
    // protected $fillable = ['id_tm_d_p','id_dokter_poli','persentase','harga','acuan'];

    public function dokter(){
    	return $this->belongsTo('App\Dokter','id_dokter','id_dokter');
    }
}
