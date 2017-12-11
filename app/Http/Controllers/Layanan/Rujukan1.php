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
        $data = Pendaftaran::JOIN('pasien', 'pendaftaran.no_rm', '=', 'pasien.no_rm')
                ->JOIN('detail_pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'detail_pendaftaran.id_pendaftaran')
                ->JOIN('poli', 'detail_pendaftaran.id_poli', '=', 'poli.id_poli')
                ->where('detail_pendaftaran.id_poli','>=','3')
                ->where('detail_pendaftaran.status', '=', 'masuk')
                ->get();
        return view('layanan/dataPasien', compact('data'));
    }

    public function detailDataPasienRujukan($poli,$id)
    {
        $data = Pendaftaran::JOIN('pasien', 'pendaftaran.no_rm', '=', 'pasien.no_rm')
                ->JOIN('detail_pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'detail_pendaftaran.id_pendaftaran')
                ->JOIN('poli', 'detail_pendaftaran.id_poli', '=', 'poli.id_poli')
                ->where('detail_pendaftaran.id_pendaftaran', '=', $id)
                ->where('detail_pendaftaran.id_poli','>=','3')->get();
        // print_r($data);
        // echo $id;
        // $data = Pendaftaran::where("id_pendaftaran","=",$id)->get();
        $dataPemeriksaan = Pemeriksaan::where('id_pendaftaran', '=', $id)->get();
        $dataJenisPemeriksaan = JenisPemeriksaan::All();
        // print_r($dataPemeriksaan);
        // print_r($dataJenisPemeriksaan->toArray());
        return view('layanan/pemeriksaan', compact('data', 'dataPemeriksaan','dataJenisPemeriksaan'));
    }
    
}