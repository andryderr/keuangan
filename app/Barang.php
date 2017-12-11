<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    public $timestamps = false;

    function jenisBarang(){
    	return $this->belongsTo('App\JenisBarang','id_jenis_barang','id_jenis_barang');
    }

    function subGrupObat(){
    	return $this->belongsTo('App\SubGrupObat','id_subgrup','id_subgrup');
    }
} 
