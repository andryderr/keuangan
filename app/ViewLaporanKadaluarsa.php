<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewLaporanKadaluarsa extends Model
{
    protected $table = 'view_laporan_kadaluarsa';
    public $timestamps = false;

     public function barang(){
    	return $this->belongsTo('App\Barang','id_barang','id_barang');
    }
}
