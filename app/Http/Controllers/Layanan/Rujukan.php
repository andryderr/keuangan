<?php

namespace App\Http\Controllers\Layanan;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Pendaftaran;
use App\DetailPendaftaran;
use App\Poli;
use App\Pemeriksaan;
use App\JenisPemeriksaan;

use DB;

class Rujukan extends Controller
{

    public function dataPasienRujukan()
    {
        $data = DetailPendaftaran::where('id_poli','=',3)->where('status','=','Masuk')->get();
        return view('layanan/dataPasien', compact('data'));
    }

    public function detailDataPasienRujukan($poli,$id)
    {
        $data = DetailPendaftaran::where('id_detail_pendaftaran','=',$id)->get();
        $dataPemeriksaan = Pemeriksaan::where('id_detail_pendaftaran', '=', $id)->get();
        $dataJenisPemeriksaan = JenisPemeriksaan::All();
        return view('layanan/pemeriksaan', compact('data', 'dataPemeriksaan','dataJenisPemeriksaan'));
    }
    
}