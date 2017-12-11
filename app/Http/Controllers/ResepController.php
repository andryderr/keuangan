<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DetailPenjualanTmp;
use App\SettingTransaksi;
use App\SubGrupObat;
use App\MutasiBarang;
use App\Pendaftaran;
use App\Penjualan;
use App\Gudang;
use App\Resep;
use App\Akun;
use App\Barang;
use App\ViewLaporanKadaluarsa;

use DB;

class ResepController extends Controller
{
	public function index(){
		$data = Pendaftaran::join('resep','resep.id_pendaftaran','=','pendaftaran.id_pendaftaran')->where('resep.total','=','0')->groupBy('pendaftaran.id_pendaftaran')->get();
		$totalobat = Barang::select(DB::raw("count(id_barang) as totalbarang"))->get();
		$obatexp = ViewLaporanKadaluarsa::select(DB::raw("count(id_barang) as obatexp"))->whereRaw('sisa_hari <= jumlah_hari')->get();
		$obatminim = MutasiBarang::select(DB::raw("count(barang.id_barang) stokminim"))->JOIN('barang', 'mutasi_barang.id_barang', '=', 'barang.id_barang')->JOIN('view_qty_akhir', 'view_qty_akhir.id_mutasi', '=', 'mutasi_barang.id_mutasi')->whereRaw('view_qty_akhir.qty_akhir <= barang.stok_minimal')->get();

		$masuk = Resep::select(DB::raw("count(id_resep) as masuk"))->get();  
		$menunggu = Resep::select(DB::raw("count(id_resep) as menunggu"))->where('total','=','0')->get();   	 
		$selesai = Resep::select(DB::raw("count(id_resep) as selesai"))->where('total','!=','0')->get();   	 
		return view('farmasi/permintaanResep',compact('data','totalobat','obatexp','obatminim','masuk','menunggu','selesai'));
	}

	public function index1(Request $request){
		if($request->ajax()){
			$id = $request->id;
			$data = Resep::where("id_resep", "=", $id)->get();
			return response()->json($data);
		}
	}

	public function dataResep($id)
	{
		$data = Pendaftaran::where('pendaftaran.id_pendaftaran','=',$id)->get();
		$gudang = Gudang::All();
		return view('farmasi/resepObat', compact('data', 'gudang'));
	}

	public function dataPenjualan1(Request $request, $id)
	{
		$data = Resep::where('id_resep', '=', $id)->get();
		// dd($data);
		$dataMaster = Penjualan::where('id_resep', '=', $id)->get();
		$status;
		$id_penjualan;
		$dataObat;
		// if (!isset($dataMaster[0])) {
		// 	echo "Kosong";
		// } else {
		// 	echo "Ada";
		// }
		$SubGrupObat = SubGrupObat::All();
		if (count($dataMaster) > '0') {
			$status = 1;
			$id_penjualan = $dataMaster[0]->id_penjualan_barang;
			$detailPenjualan = DetailPenjualanTmp::where('id_penjualan_barang', '=', $id_penjualan)->get();
			$dataObat = MutasiBarang::join('barang', 'barang.id_barang', '=', 'mutasi_barang.id_barang')->join('view_qty_akhir', 'mutasi_barang.id_mutasi', '=', 'view_qty_akhir.id_mutasi')->where('qty_akhir', '>', 0)->where('id_gudang', '=', $dataMaster[0]->id_gudang)->whereIn('barang.kat_barang', ['Obat', 'Alat Medis'])->get();	
			$j_kecil = DetailPenjualanTmp::select(DB::raw("id_barang as id_bar, sum(jumlah_kecil) as jumlah"))->where('id_penjualan_barang', '=', $id_penjualan)->groupBy('id_barang')->get();
		} else {
			$status = 0;
			$gudang = Gudang::All();
			$dataObat = MutasiBarang::All();
		}

		if (!isset($dataMaster[0])) {
			return view('farmasi/penjualanFarmasi', compact('data','status', 'id_penjualan', 'dataMaster', 'detailPenjualan', 'dataObat', 'j_kecil', 'gudang', 'dataPasien', 'SubGrupObat'));
		}else if (empty($dataMaster[0]->total)) {
			return view('farmasi/penjualanFarmasi', compact('data','status', 'id_penjualan', 'dataMaster', 'detailPenjualan', 'dataObat', 'j_kecil', 'gudang', 'dataPasien', 'SubGrupObat'));
		} else if ($dataMaster[0]->total) {
			$request->session()->flash('alert-info', 'Pembelian Telah Selesai!');
			return redirect("FARMASI/masterPenjualan");
		}
	}

	public function simpanMasterPenjualan(Request $request)
	{
		// print_r($request->id_dokter);
		$data = new Penjualan;
		$data->kat_barang = 'Obat';
		$data->tanggal_penjualan = $request->tgl_jual;
		$data->id_resep = $request->id_resep;
		$data->tanggal_resep = $request->tanggal_resep;
		$data->id_gudang = $request->id_gudang_master;
		$data->id_dokter = $request->id_dokter;
		$data->kat_pembeli = 'Pasien';
		$data->id_pendaftaran = $request->id_pendaftaran;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

	public function updateMasterPenjualan(Request $request)
	{
		$data = SettingTransaksi::where('jenis_transaksi', '=', 'Penjualan')->get();
		$status_akun = Akun::where('id_akun', '=', $data[0]->id_akun)->get();
		$dataMaster = Penjualan::where('id_penjualan_barang', '=', $request->id_penjualan_barang_master)->get();
		$update = Penjualan::where('id_penjualan_barang','=', $request->id_penjualan_barang_master)->update([
			'total'         => $request->total_semua,
			'netto'         => $request->total_semua,
			'jenis_bayar'   => 'Kredit',
			]);
		for ($i=0; $i < count($request->id_bar); $i++) { 
			$update1 = MutasiBarang::where('id_gudang', '=', $request->id_gudang1)->where('id_barang', '=', $request->id_bar[$i])->increment('qty_penjualan', $request->j_kecil[$i]);
		}
		$update2 = Resep::where('id_resep', '=', $request->id_resep)->update([
			'total'			=> $request->total_semua
			]);
		if ($update) {
			$request->session()->flash('alert-info', 'Pembelian Berhasil Dilakukan!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return redirect("FARMASI/resepObat/".$dataMaster[0]->id_pendaftaran);
	}

	public function riwayatResep()
	{
		$data = Resep::select(DB::raw("*, count(id_resep) as banyak_resep"))
		->groupBy('id_pendaftaran')
		->get();
		return view('farmasi/riwayat_resep', compact('data'));
	}
}
