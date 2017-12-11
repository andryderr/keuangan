<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupObat extends Model
{
    protected $table = "grup_obatmedis";

    public $timestamps = false; 

    public function subGrupObat(){
    	return $this->belongsTo('App\SubGrupObat','id','id');
    }
}
