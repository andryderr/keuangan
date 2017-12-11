<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Pendaftaran extends Model
{
    protected $table = "pendaftaran";
    public $timestamps = false;

    function pasien(){
		return $this->belongsTo('App\Pasien','no_rm','no_rm');
	}

	function resep(){
	    return $this->hasMany('App\Resep','id_pendaftaran','id_pendaftaran');
	}

	function penjualan(){
	    return $this->hasMany('App\Penjualan','id_pendaftaran','id_pendaftaran');
	}

	function detail(){
		return $this->hasMany('App\DetailPendaftaran','id_pendaftaran','id_pendaftaran');
	}

	function pemeriksaan(){
		return $this->hasMany('App\Pemeriksaan','id_pendaftaran','id_pendaftaran');
	}

		function poli(){
		return $this->belongsTo('App\Poli','id_poli','id_poli');
	}

	function getEnum($field){
		$data = DB::select(DB::raw("show columns from ".Pendaftaran::getTable()." where Field = '".$field."' "));
		preg_match('/^enum\((.*)\)$/', $data[0]->Type, $matches);
		$enum = array();
		foreach( explode(',', $matches[1]) as $value )
		{
			$v = trim( $value, "'" );
			$enum = array_add($enum, $v, $v);
		}
		return $enum;
	}

}