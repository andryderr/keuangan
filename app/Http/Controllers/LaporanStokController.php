<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use App\Barang;
use App\MutasiBarang;
use App\Batch;
use App\ViewLaporanKadaluarsa;

class LaporanStokController extends Controller
{
    public function laporanStokBarang(){
    	$stok = Barang::whereIn('barang.kat_barang',  ['Obat', 'Psikotropika', 'Narkotika', 'Daftar G'])->get();
    	return view('farmasi/laporan_stokBarang', compact('stok'));
    }

    public function laporanMutasiStok(){
    	$mutasi = MutasiBarang::join('barang', 'mutasi_barang.id_barang', '=', 'barang.id_barang')->whereIn('barang.kat_barang',  ['Obat', 'Psikotropika', 'Narkotika', 'Daftar G','Alat Medis'])->orderBy('mutasi_barang.id_mutasi')->get();
        // print_r($mutasi[0]);
    	return view('farmasi/laporan_mutasiStokBarang', compact('mutasi'));
    }

    public function laporanKadaluarsa(){
        $kadal = ViewLaporanKadaluarsa::whereRaw('sisa_hari <= jumlah_hari')->get();
        return view('farmasi/laporan_kadaluarsa', compact('kadal'));
    }

    public function laporanStokMinimal(){
        $stokminim = MutasiBarang::JOIN('barang', 'mutasi_barang.id_barang', '=', 'barang.id_barang')->JOIN('view_qty_akhir', 'view_qty_akhir.id_mutasi', '=', 'mutasi_barang.id_mutasi')->whereRaw('view_qty_akhir.qty_akhir <= barang.stok_minimal')->get();        
        return view('farmasi/laporan_stokminimal', compact('stokminim'));
    }
}
