<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengolahan extends Model
{
	protected $table= "detail_pengolahan_sajian";

	public $timestamps = false;

	function barang(){

		return $this->belongsTo('App\Barang','id_barang','id_barang');
	}
}
