<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKamarInap extends Model
{
    protected $table = "detail_kamar_inap";
    public $timestamps = false;

    public function kamar(){
    	return $this->belongsTo("App\Kamar","id_kamar","id_kamar");
    }
    public function view(){
    	return $this->hasOne('App\ViewDetailKamarInap',"id_kamar_inap","id_kamar_inap");
    }
}
