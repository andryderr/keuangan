<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Akun;
use App\DetailAkun;
use App\KasHarian;
use Alert;

class AkunController extends Controller
{
	public function dataAkun(){
		$data = Akun::all();
		return view('kasir/akun',compact('data'));
	}

	public function tambahAkun(Request $request){
		$data = new Akun;
		$data->nama_akun = $request->nama_akun;
		$data->status_akun = $request->status_akun;
		try {
			$data->save();
			Alert::success('Data Berhasil Dimasukkan!')->persistent("Close");
		} catch (Exception $e) {
			Alert::error('Data Gagal Dimasukkan!')->persistent("Close");
		}
		return back();
	}

	public function editAkun(Request $request){
		$simpan = Akun::where('id_akun','=',$request->id_akun)->update([
			'nama_akun' => $request->nama_akun,
			'status_akun' => $request->status_akun
			]);
		if ($simpan) {
			Alert::success('Data Berhasil Diubah!')->persistent("Close");
		}else{
			Alert::error('Data Gagal Diubah!')->persistent("Close");
		}
		return back();
	}

	public function hapusAkun($id, Request $request)
	{
		$hapus = Akun::where('id_akun', $id);
		$hapus->delete();
		if ($hapus) {
			Alert::success('Data Berhasil Dihapus!')->persistent("Close");
		}else{
			Alert::error('Data Gagal Dihapus!')->persistent("Close");
		}
		return back();
	}

	public function detailAkun($id){
		$data = DetailAkun::where('id_akun','=',$id)->get();
		$saldoawal = $data[0]->saldo_awal;
		$kasmasuk = KasHarian::select(DB::raw("sum(saldo_masuk) as totkasmasuk"))->where('id_akun','=',$id)->get();
		$kaskeluar = KasHarian::select(DB::raw("sum(saldo_keluar) as totkaskeluar"))->where('id_akun','=',$id)->get();
		$totkasmasuk = $kasmasuk[0]->totkasmasuk;
		$totkaskeluar = $kaskeluar[0]->totkaskeluar;
		$saldoakhir = ($saldoawal + $totkasmasuk) - $totkaskeluar;
		return view('kasir/detail_akun',compact('data','saldoakhir'));
	}

	public function tambahDetailAkun(Request $request){
		$data = new DetailAkun;
		$data->id_akun = $request->id_akun;
		$tanggal = $request->tgl_akun;
		$data->bulan = substr($request->tgl_akun, 5,6);
		$data->tahun = substr($request->tgl_akun, 0,4);
		$data->saldo_awal = str_replace(".", "",$request->saldoakhir);
		try {
			$data->save();
			Alert::success('Data Berhasil Dimasukkan!')->persistent("Close");
		} catch (Exception $e) {
			Alert::error('Data Gagal Dimasukkan!')->persistent("Close");
		}
		return back();
	}
}
