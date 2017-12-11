<?php

namespace App\Http\Controllers\RawatInap;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Rekomendasi;
use App\Barang;

use DB;

class RekomendasiController extends Controller
{
  public function dataRekomendasi()
  {
    date_default_timezone_set("Asia/Jakarta");
    $rekomPagi = DB::select("SELECT *, DATE_FORMAT(rk.tgl_rekomendasi, '%Y-%m-%d') as tgl, COUNT(rk.id_jenis_barang) as banyak, (select sum(stok) from barang b WHERE b.id_jenis_barang = jb.id_jenis_barang) as jumlah FROM rekomendasi rk LEFT JOIN jenis_barang jb ON rk.id_jenis_barang = jb.id_jenis_barang WHERE rk.shift = 'Pagi' AND rk.status = 0 AND CAST(tgl_rekomendasi as date) = CURDATE() GROUP BY rk.id_jenis_barang");
    $rekomSiang = DB::select("SELECT *, DATE_FORMAT(rk.tgl_rekomendasi, '%Y-%m-%d') as tgl, COUNT(rk.id_jenis_barang) as banyak, (select sum(stok) from barang b WHERE b.id_jenis_barang = jb.id_jenis_barang) as jumlah FROM rekomendasi rk LEFT JOIN jenis_barang jb ON rk.id_jenis_barang = jb.id_jenis_barang WHERE rk.shift = 'Siang' AND rk.status = 0 AND CAST(tgl_rekomendasi as date) = CURDATE() GROUP BY rk.id_jenis_barang");
    $rekomMalam = DB::select("SELECT *, DATE_FORMAT(rk.tgl_rekomendasi, '%Y-%m-%d') as tgl, COUNT(rk.id_jenis_barang) as banyak, (select sum(stok) from barang b WHERE b.id_jenis_barang = jb.id_jenis_barang) as jumlah FROM rekomendasi rk LEFT JOIN jenis_barang jb ON rk.id_jenis_barang = jb.id_jenis_barang WHERE rk.shift = 'Malam' AND rk.status = 0 AND CAST(tgl_rekomendasi as date) = CURDATE() GROUP BY rk.id_jenis_barang");

    return view('gizi/rekomSajian', compact('rekomPagi', 'rekomSiang', 'rekomMalam'));
  }

  public function dataPasienDistribusi(Request $request)
  {
    if($request->ajax()){
      date_default_timezone_set("Asia/Jakarta");
      $data = DB::select("SELECT * FROM rekomendasi r LEFT JOIN jenis_barang jb ON r.id_jenis_barang = jb.id_jenis_barang LEFT JOIN detail_pendaftaran dp ON r.id_detail_pendaftaran = dp.id_detail_pendaftaran LEFT JOIN pendaftaran p ON dp.id_pendaftaran = p.id_pendaftaran WHERE CAST(tgl_rekomendasi as date) = CURDATE() AND r.id_jenis_barang = ? ", [$request->id]);
          // print_r($data);
      $jenis_sajian = Barang::where('id_jenis_barang', '=', $request->id)->where('stok', '>', '0')->get();
      $d = array('data' => $data,'jenis_sajian' => $jenis_sajian);
      return response()->json($d);
    }
  }

  public function tambahRekomendasi(Request $request)
  {
    $request->offsetUnset("_token");
    $insert = Rekomendasi::insert($request->toArray());        
    if ($insert) {
      $request->session()->flash('alert-info', 'Data Berhasil Ditambah!');
    }else{
     $request->session()->flash('alert-warning', 'Data Gagal Ditambahkan!');
   }
   return back();
 }

 public function hapusRekomendasi($id)
 {
   $hapus = Rekomendasi::where('id_rekomendasi', '=', $id)->delete();
   if ($hapus) {
    session()->flash('alert-danger', 'Data Berhasil Dihapus!');
  } else{
    session()->flash('alert-warning', 'Data Gagal Dihapus!');
  }
  return back();
}

public function simpanDistribusi(Request $request)
{

}

public function dataDistribusi()
{

}

}