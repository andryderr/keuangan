<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Poli extends Model
{
    protected $table = "poli";
    public $timestamps = false;
    protected $fillable = ['nama_poli','prefix','jam_kunjung1','jam_kunjung2','jam_kerja1','jam_kerja2','kat_poli'];
    function getEnum($field){
    	$data = DB::select(DB::raw("show columns from ".Poli::getTable()." where Field = '".$field."' "));
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