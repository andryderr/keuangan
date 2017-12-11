<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailRevisi extends Model
{
    protected $table = "detail_revisi";

    public $timestamps = false;

    function barang(){
    	return $this->belongsTo('App\Barang','id_barang','id_barang');
    }
}
