<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    protected  $table = "kas_masuk";

    public $timestamps = false;

    public function akun(){
    	return $this->belongsTo('App\Akun','id_akun','id_akun');
    }

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
