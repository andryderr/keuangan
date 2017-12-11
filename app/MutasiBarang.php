<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MutasiBarang extends Model
{
	protected $table = "mutasi_barang";					
	
	public $timestamps = false;					
	
	public function gudang(){					
		return $this->belongsTo('App\Gudang','id_gudang','id_gudang');			
	}				
	
	public function barang(){				
		return $this->belongsTo("App\Barang",'id_barang','id_barang');			
	}

	public function qty_akhir()
	{
		return $this->belongsTo("App\ViewQtyAkhir", 'id_mutasi', 'id_mutasi');
	}
}
