<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = "batch";

    public $timestamps = false;

    public function barang()
   	{
   		return $this->belongsTo("App\Barang", "id_barang", "id_barang");
   	}

}
