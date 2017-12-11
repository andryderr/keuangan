<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Support\Facades\Schema;
use DB;

class Pasien extends Model
{
	protected $table = "pasien";
	protected $fillable = ['no_rm','no_kepesertaan','no_sep','jenis_kepesertaan','nama','jenis_kelamin','tanggal_lahir','alamat','kabupaten','kecamatan','desa','dusun','tempat_lahir','berat_lahir','gol_darah','agama','status','pekerjaan','jenis_identitas','no_identitas','telepon','nama_orang_tua','nama_suami_istri'];
	protected $guarded = ['_token'];

	protected $primaryKey = "no_rm";

	public $timestamps = false;

	public function Pendaftaran(){
		return $this->hasMany("App\Pendaftaran","no_rm","no_rm");
	}

	function getInsertData($request){
		$data = DB::select(DB::raw('show columns from '.Pasien::getTable()));
		$data1 = json_decode(json_encode($data,true));
        foreach ($data1 as $key => $value) {
            $data2[$value->Field] = $request[$value->Field];
        }
		return $data2;
	}

	function getEnum($field){
		$data = DB::select(DB::raw("show columns from ".Pasien::getTable()." where Field = '".$field."' "));
		preg_match('/^enum\((.*)\)$/', $data[0]->Type, $matches);
		$enum = array();
		foreach( explode(',', $matches[1]) as $value )
		{
			$v = trim( $value, "'" );
			$enum = array_add($enum, $v, $v);
		}
		return $enum;
	}

	function umur(){
		return $this->hasMany("App\ViewUmurPasien",'no_rm','no_rm');
	}
}
