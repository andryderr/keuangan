<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubGrupObat extends Model
{
 protected $table = "subgrup_obatmedis";

 public $timestamps = false;
 
  function grupObat(){
    	return $this->belongsTo('App\GrupObat','id_grup','id_grup');
    }
}
