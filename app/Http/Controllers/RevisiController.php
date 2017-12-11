<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Gudang;
use App\RevisiStok;
use App\Barang;
use App\DetailRevisi;
use App\MutasiBarang;

class RevisiController extends Controller
{
    public function updateMasterRevisi(Request $request)
    {
        $update = RevisiStok::where('id_revisi', '=', $request->id_revisi)->update([
            'status'    => 'Selesai',
            ]);
        for ($i=0; $i < count($request->id_bar); $i++) { 
            $update1 = MutasiBarang::where('id_gudang', '=', $request->id_gudang_master)->where('id_barang', '=', $request->id_bar[$i])->increment('qty_revisi_stok', $request->j_kecil[$i]);
        }
        return redirect("FARMASI/revisiStok");
    }

    public function master()
    {
        $data = RevisiStok::All();
        return view('farmasi/master_revisiStok', compact('data'));
    }

    public function hapusMaster(Request $request, $id)
    {
        $hapus = RevisiStok::where('id_revisi', '=', $id)->delete();

        if ($hapus) {
            $request->session()->flash('alert-danger', 'Data Berhasil Dihapus');
        } else {
            $request->session()->flash('alert-info', 'Data Gagal Dihapus');
        }

        return back();
    }

    public function index()
    {
        $status = 0;
        $dataGudang = Gudang::All();
        return view('farmasi/revisiStok', compact('status', 'dataGudang'));
    }

    public function index1($poli, $id)
    {
        $status = 1;
        $dataRevisi = RevisiStok::where('id_revisi', '=', $id)->get();
        $dataBarang = MutasiBarang::join('barang', 'barang.id_barang', '=', 'mutasi_barang.id_barang')->where('id_gudang', '=', $dataRevisi[0]->id_gudang)->where('kat_barang', '=', 'Obat')->orWhere('kat_barang', '=', 'Alat Medis')->get();
        $detailRevisi = DetailRevisi::where('id_revisi', '=', $id)->get();
        return view('farmasi/revisiStok', compact('status', 'dataRevisi', 'dataBarang', 'detailRevisi'));
    }

    public function tambahMasterRevisi(Request $request)
    {
        $insert = RevisiStok::insertGetId([
            'tgl_revisi'    => $request->tgl_revisi,
            'keterangan'    => $request->keterangan,
            'id_gudang'     => $request->id_gudang,
            'status'        => 'Proses',
            ]);
        if ($insert) {
            $request->session()->flash('alert-info', 'Data Berhasil Ditambahkan!');
        } else {
            $request->session()->flash('alert-warning', 'Data Gagal Ditambahkan!');
        }
        return redirect("FARMASI/RevisiStok/".$insert);
    }

    public function tambahDetailRevisi(Request $request)
    {
        // $qty = substr($request->j_kecil, 1);

        $insert = DetailRevisi::insert([
            'id_revisi'     => $request->id_revisi,
            'id_barang'     => $request->id_barang,
            'stok_awal'     => $request->stok,
            'qty_revisi'    => $request->j_kecil,
            ]);
        if ($insert) {
            $request->session()->flash('alert-info', 'Data Berhasil Ditambahkan!');
        } else {
            $request->session()->flash('alert-warning', 'Data Gagal Ditambahkan!');
        }
        return back();
    }

    public function hapusDetailRevisi(Request $request, $id)
    {
        $hapus = DetailRevisi::where('id_revisi', '=', $id)->delete();

        if ($hapus) {
            $request->session()->flash('alert-danger', 'Data Berhasil Dihapus');
        } else {
            $request->session()->flash('alert-info', 'Data Gagal Dihapus');
        }

        return back();
    }
}
