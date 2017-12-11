<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Gudang;
use App\PemindahanBarang;
use App\Barang;
use App\DetailPemindahanBarang;
use App\MutasiBarang;
use DB;

class PemindahanBarangController extends Controller
{
	public function getDataMasterPemindahan(){
		$data = PemindahanBarang::all();
		return view('farmasi/master_pemindahanBarang', compact('data'));
	}

	public function dataDetailPemindahan(){
		$gudang = Gudang::all();
		$status = 0;
		return view('farmasi/pemindahanBarangGudang', compact('gudang','status'));
	}

	public function dataMasterPemindahan($id){
		$gudang = Gudang::all();
		$data = PemindahanBarang::where('id_pemindahan', '=', $id)->get();
		$idgudang = PemindahanBarang::select('id_gudang_awal')->where('id_pemindahan', '=', $id)->get();
		$dataBahanBaku1 = MutasiBarang::join('barang', 'mutasi_barang.id_barang', '=', 'barang.id_barang')->join('gudang','mutasi_barang.id_gudang','=','gudang.id_gudang')->whereIn('barang.kat_barang',  ['Obat', 'Psikotropika', 'Narkotika', 'Daftar G','Alat Medis'])->where('mutasi_barang.id_gudang','=', $idgudang[0]->id_gudang_awal)->get();
		$detail = DetailPemindahanBarang::where('id_pemindahan','=',$id)->get();
		$barangsama = DetailPemindahanBarang::select(DB::raw("id_barang as id_bar, sum(jumlah_kecil) as jumlah"))->where('id_pemindahan', '=', $id)->groupBy('id_barang')->get();
		$status = 1;
		return view('farmasi/pemindahanBarangGudang', compact('gudang','data','status','dataBahanBaku1','detail','barangsama'));
	}

	public function tambahMasterPemindahan(Request $request){
		$data = new PemindahanBarang;
		$data->tgl_pemindahan = $request->tgl_pemindahan;
		$data->keterangan = $request->ket_pemindahan;
		$data->id_gudang_awal = $request->gudangawal;
		$data->id_gudang_tujuan = $request->gudangtujuan;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return redirect("FARMASI/PemindahanBarang/".$data->id);
	}

	public function tambahItemDetail(Request $request){
		$data = new DetailPemindahanBarang;
		$data->id_pemindahan  = $request->id_pemindahan;
		$data->id_barang            = $request->id_barang_pemindahan;
		$data->jumlah               = $request->jumlah_pemindahan;
		$data->satuan               = $request->satuan_pemindahan;
		$data->subtotal            = $request->subtotal_pemindahan;
		$data->jumlah_kecil		    = $request->jumlah_kecil;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

	public function hapusMasterPemindahan($id, Request $request){
		$data = PemindahanBarang::where('id_pemindahan', $id);
		try {
			$data->delete();				
			$request->session()->flash('alert-danger', 'Data Pemindahan Berhasil Dihapus!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Pemindahan Gagal Dihapus!');
		}
		return back();
	}

	public function hapusDetailPemindahan($id, Request $request){
		$data = DetailPemindahanBarang::where('id_detail_pemindahan', $id);
		try {
			$data->delete();				
			$request->session()->flash('alert-danger', 'Data Pemindahan Berhasil Dihapus!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Pemindahan Gagal Dihapus!');
		}
		return back();
	}

	public function selesaiPemindahan(Request $request){
		$update = PemindahanBarang::where('id_pemindahan','=', $request->id_pemindahan)->update([
			'total_pemindahan' => $request->total_pemindahan
			]);
		for ($i=0; $i < count($request->id_bar) ; $i++) {
			$update1 = MutasiBarang::where('id_barang', '=', $request->id_bar[$i])->where('id_gudang','=', $request->id_gudangawal)->decrement('qty_pemindahan', $request->j_kecil[$i]);
			$update1 = MutasiBarang::where('id_barang', '=', $request->id_bar[$i])->where('id_gudang','=', $request->id_gudangtujuan)->increment('qty_pemindahan', $request->j_kecil[$i]);
		}
		if ($update) {
			$request->session()->flash('alert-info', 'Data Berhasil Disimpan!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Disimpan!');
		}
		return redirect("FARMASI/masterPemindahanBarang");
	}
}
