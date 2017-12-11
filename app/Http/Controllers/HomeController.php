<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pasien;
use App\Barang;
use App\Pendaftaran;
use App\DetailMedisKelas;
use App\Kelas;
use App\TindakanMedis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo Auth::user()->name;
        return view('home');
    }

    public function hapusPasien()
    {
        $hapus = Pasien::where('no_rm', '>', '0')->delete();
        Barang::where('id_barang', '>', '0')->delete();
        Pendaftaran::where('id_pendaftaran', '>', '0')->delete();
        if ($hapus) {
            echo "success";
        }
    }
    public function dataKelasMedis(){
        $kelas = Kelas::all();
        $Tindakan = TindakanMedis::all();
        foreach ($kelas as $key => $value) {
            foreach ($Tindakan as $keys => $val) {
                $data = new DetailMedisKelas;
                $data->id_tm_d_p = $val->id_tm_d_p;
                $data->id_kelas = $value->id_kelas;
                $data->save();
            }
        }
        echo "sukses";
    }
}
