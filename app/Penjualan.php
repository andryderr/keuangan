<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    
    protected $table = "penjualan_barang";

    public $timestamps = false;

    Public function cust(){
		return $this->belongsTo("App\Customer",'id_customer','id_customer');
	}

	public function returpen()
	{
		return $this->hasMany('App\ReturPenjualan', 'id_penjualan_barang', 'id_penjualan_barang');
	}
	
	public function dok(){
		return $this->belongsTo("App\Dokter",'id_dokter','id_dokter');
	}

	public function detpen(){
		return $this->hasMany("App\DetailPenjualan",'id_penjualan_barang','id_penjualan_barang');
	}

	public function pendaftaran(){
		return $this->belongsTo("App\Pendaftaran", 'id_pendaftaran', 'id_pendaftaran');
	}

	public function user()
	{
		return $this->belongsTo("App\Users", 'id', 'id');
	}

	public function gudang()
	{
		return $this->belongsTo("App\Gudang", 'id_gudang', 'id_gudang');
	}

	public function resepluar()
	{
		return $this->belongsTo('App\ResepLuar', 'id_resep', 'id_resep');
	}

	public function obatKembali(){
		return $this->hasMany('App\ReturPenjualan','id_penjualan_barang','id_penjualan_barang');
	}
}
