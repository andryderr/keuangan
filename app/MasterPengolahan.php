<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPengolahan extends Model
{
	protected $table = "pengolahan_barang_sajian";

	public $timestamps = false;

	function detail_pengolahan(){
		return $this->hasMany('App\DetailPengolahan','id_pengolahan','id_pengolahan');
	}
	
}
