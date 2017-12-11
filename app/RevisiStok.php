<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevisiStok extends Model
{
    protected $table = "revisi_stok";

    public $timestamps = false;

    function gudang(){
    	return $this->belongsTo('App\Gudang','id_gudang','id_gudang');
    }

    function detail(){
    	return $this->hasMany('App\DetailRevisi', 'id_revisi', 'id_revisi');
    }
}
