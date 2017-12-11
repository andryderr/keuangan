<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\DetailStokOpnameTmp;
use App\SubGrupObat;
use App\StokOpname;
use App\Gudang;

class StokOpnameController extends Controller
{
    public function index($poli)
    {
    	$data = StokOpname::All();
    	$gudang = Gudang::where('status', '=', 0)->get();

    	return view('farmasi/master_StokOpname', compact('data', 'gudang'));
    }

    public function simpanMaster($poli, Request $request)
    {
    	$data = new StokOpname;
    	$data->tgl_stok_opname = $request->tgl_stok_opname;
    	$data->id_gudang = $request->id_gudang;
    	$data->keterangan = $request->keterangan;
    	$data->id = Auth::user()->id;
    	try {
    		$data->save();
    		$request->session()->flash('alert-success', 'Data Berhasil Dimasukkan!');
    	} catch (Exception $e) {
    		$request->session()->flash('alert-info', 'Data Gagal Dimasukkan!');
    	}

    	return redirect($poli.'/detailStokOpname/'.$data->id);
    }

    public function hapusMaster($poli, $id)
    {
        $data = StokOpname::where("id_stok_opname", "=", $id)->delete();
        $data1 = DetailStokOpnameTmp::where("id_stok_opname", "=", $id)->delete();
        $data2 = DetailStokOpname::where("id_stok_opname", "=", $id)->delete();
        return back();
    }

    public function detailStokOpname($poli, $id)
    {
    	$data = StokOpname::where('id_stok_opname', '=', $id)->get();
        $SubGrupObat = SubGrupObat::All();
        $dataDetail = DetailStokOpnameTmp::where('id_stok_opname', '=', $id)->get();

        return view('farmasi/stokOpname', compact('data', 'SubGrupObat', 'dataDetail'));
    }

    public function simpanDetail($poli, Request $request)
    {
        // print_r($request->id_bar);
        $data = new DetailStokOpnameTmp;
        $data->id_stok_opname = $request->id_stok_opname;
        $data->id_barang = $request->id_bar;
        $data->stok_awal = $request->stok_awal;
        $data->stok_opname = $request->jumlah_kecil;
        try {
            $data->save();
            $request->session()->flash('alert-success', 'Data Berhasil Dimasukkan!');
        } catch (Exception $e) {
            $request->session()->flash('alert-info', 'Data Gagal Dimasukkan!');
        }

        return back();
    }

    public function hapusDetail($poli, $id)
    {
        $data = DetailStokOpnameTmp::where("id_detail_stok_opname", "=", $id);
        $data->delete();
        return back();
    }

    public function updateMasterStokOpname($poli, Request $request)
    {
        $data = StokOpname::where('id_stok_opname', '=', $request->id_stok_opname);
        try {
            $data->update([
                "status" => "Selesai"
            ]); 
            $request->session()->flash('alert-success', 'Data Berhasil Disimpan');
            return redirect(Auth::user()->poli->prefix."/stokOpname");
        } catch (Exception $e) {
            $request->session()->flash('alert-success', 'Data Gagal Disimpan');
            return back();
        }
    }
}
