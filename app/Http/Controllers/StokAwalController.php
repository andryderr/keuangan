<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Gudang;
use App\StokAwal;
use App\DetailStokAwal;
use App\DetailStokAwalTmp;
use App\Barang;
use App\MutasiBarang;

use DB;

class StokAwalController extends Controller
{
	public function masterStokAwal(){
		$data = Gudang::All();
		$masterstokawal = StokAwal::All();
		$totalbarang = Barang::count();
		$totalstok = Barang::sum('stok');
		$id = 0;
		return view('farmasi/master_stokawal', compact('data','masterstokawal','id', 'totalstok', 'totalbarang'));
	} 

	public function dataMasterStokAwal($id){
		$data = Gudang::All();
		$gudang = Gudang::where('id_gudang','=', $id)->get();
		$masterstokawal = StokAwal::where('id_gudang','=',$id)->get();
		return view('farmasi/master_stokawal', compact('data','masterstokawal','id','gudang'));
	}

	public function tambahMasterStokAwal(Request $request){
		$data = new StokAwal;
		$data->tgl_stokawal = $request->tanggal_stokawal;
		$data->id_gudang = $request->id_gudang;

		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

	public function hapusMasterStokAwal($id){
		$data = StokAwal::where('id_stokawal', $id);
		$data->delete();
		return back();
	}

	public function dataDetailStokAwal($id){
		$master = StokAwal::where('id_stokawal','=',$id)->get();
		$detail = DetailStokAwalTmp::join('barang', 'barang.id_barang', '=', 'detail_stokawal_tmp.id_barang')->select(DB::raw("*,detail_stokawal_tmp.id_barang as id_bar, sum(qty_awal) as jumlah"))->where('id_stokawal','=', $id)->groupBy('detail_stokawal_tmp.id_barang')->get();
		$dataBahanBaku1 = Barang::where('kat_barang','=', 'Obat')->get();

		return view('farmasi/detail_stokAwal', compact('master','detail','dataBahanBaku1'));
	}

	public function tambahItemStokAwal(Request $request)
	{
		$data = new DetailStokAwalTmp;
		$data->id_stokawal  = $request->id_stokawal;
		$data->id_barang    = $request->id_barang_stokawal;
		$data->qty_awal     = $request->jumlah_stokawal;
		$data->satuan       = $request->satuan_stokawal;
		$data->subtotal     = $request->subtotal_stokawal;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

	public function hapusDetailStokAwal(Request $request, $id){
		$data = DetailStokAwalTmp::where('id_detailstokawal','=',$id);
		try {
			$data->delete();
			$request->session()->flash('alert-warning', 'Data Berhasil Dihapus!');
		} catch (Exception $e) {
			$request->session()->flash('alert-danger', 'Data Gagal Dihapus!');
		}
		return back();
	}

	public function selesaiStokAwal(Request $request){
		$update = StokAwal::where('id_stokawal','=', $request->id_stokawal)->update([
			'total_stokawal' => $request->total_stokawal
			]);
		// print_r($request->id_bar);
		for ($i=0; $i < count($request->id_bar); $i++) { 
			$update1 = MutasiBarang::where('id_gudang', '=', $request->id_gudang1)->where('id_barang', '=', $request->id_bar[$i])->increment('qty_awal', $request->j_kecil[$i]);
			// print_r(MutasiBarang::where('id_gudang', '=', $request->id_gudang1)->where('id_barang', '=', $request->id_bar[$i])->get());
		}
		if ($update) {
			$request->session()->flash('alert-info', 'Data Berhasil Disimpan!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Disimpan!');
		}
		return redirect('FARMASI/masterStokAwal');
	}

}
