<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model {

  protected $table = "pembelian_barang";

  public $timestamps = false;

  public function sup()
  {
   return $this->belongsTo("App\Supplier", 'id_supplier', 'id_supplier');
  }

  public function detpem()
  {
  return $this->hasMany("App\DetailPembelian", 'id_pembelian_barang', 'id_pembelian_barang');
  }

  public function user()
  {
    return $this->belongsTo("App\Users", 'id', 'id');
  }
  
  public function gudang()
  {
    return $this->belongsTo("App\Gudang", 'id_gudang', 'id_gudang');
  }
}
