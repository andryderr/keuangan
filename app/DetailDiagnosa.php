<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailDiagnosa extends Model
{
    protected $table = 'detail_diagnosa';
    public $timestamps = false;

    public function diagnosa(){
    	return $this->belongsTo('App\JenisDiagnosa','id_diagnosa','id_diagnosa');
    }
}
