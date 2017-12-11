<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasHarian extends Model
{
    protected $table = "kas_harian";

    public $timestamps = false;

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier','id_supplier','id_supplier');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer','id_customer','id_customer');
    }

    public function pendaf()
    {
    	return $this->belongsTo('App\Pendaftaran', 'id_pendaftaran', 'id_pendaftaran');
    }
      public function user(){
        return $this->belongsTo('App\Users','id','id');
    }
}
