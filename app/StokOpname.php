<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokOpname extends Model
{
	protected $table = "stok_opname";

	public $timestamps = false;

	public function gudang()
	{
		return $this->belongsTo('App\Gudang', 'id_gudang', 'id_gudang');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'id', 'id');
	}
}
