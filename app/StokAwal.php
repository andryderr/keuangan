<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokAwal extends Model
{
	protected $table = "master_stokawal";

	public $timestamps = false; 

	public function gudang(){
		return $this->belongsTo('App\Gudang','id_gudang','id_gudang');
	}

	public function detailstokawal(){
		return $this->hasMany('App\DetailSokAwal','id_stokawal','id_stokawal');
	}

}