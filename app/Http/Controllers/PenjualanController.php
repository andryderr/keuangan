<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\DetailPenjualanTmp;
use App\SettingTransaksi;
use App\DetailPenjualan;
use App\Http\Requests;
use App\ViewQtyAkhir;
use App\MutasiBarang;
use App\SubGrupObat;
use App\ResepLuar;
use App\Penjualan;
use App\KasMasuk;
use App\Customer;
use App\Piutang;
use App\Barang;
use App\Pasien;
use App\Dokter;
use App\Gudang;
use App\Akun;
use App\Batch;
use Auth;

use DB;

class PenjualanController extends Controller
{
	public function dataMaster()
	{
		$master = Penjualan::where('kat_pembeli', '=', 'Umum')->get();
		return view('farmasi/masterPenjualan', compact('master'));
	}

	public function dataPenjualan()
	{
		$status = 0;
		$dataObat = Barang::where('kat_barang', '=', 'Obat')->orWhere('kat_barang', '=', 'Alat Medis')->get();
		$gudang = Gudang::All();
		$dataDokter = Dokter::All();
		$SubGrupObat = SubGrupObat::All();

		return view('farmasi/penjualanObat', compact('dataObat', 'status', 'gudang', 'dataDokter', 'SubGrupObat'));
	}

	public function dataPenjualan1(Request $request, $id)
	{
		$status = 1;
		$id_penjualan = $id;
		$dataMaster = Penjualan::where('id_penjualan_barang', '=', $id)->get();
		$detailPenjualan = DetailPenjualanTmp::where('id_penjualan_barang', '=', $id)->get();
		$SubGrupObat = SubGrupObat::All();
		if (empty($dataMaster[0]->id_resep)) {
			$dataObat = MutasiBarang::join('barang', 'barang.id_barang', '=', 'mutasi_barang.id_barang')->join('view_qty_akhir', 'mutasi_barang.id_mutasi', '=', 'view_qty_akhir.id_mutasi')->where('qty_akhir', '>', 0)->where('id_gudang', '=', $dataMaster[0]->id_gudang)->whereIn('barang.kat_barang', ['Obat', 'Alat Medis'])->get();	
		} else {
			$dataObat = MutasiBarang::join('barang', 'barang.id_barang', '=', 'mutasi_barang.id_barang')->join('view_qty_akhir', 'mutasi_barang.id_mutasi', '=', 'view_qty_akhir.id_mutasi')->where('qty_akhir', '>', 0)->where('id_gudang', '=', $dataMaster[0]->id_gudang)->whereIn('barang.kat_barang', ['Obat', 'Alat Medis', 'Psikotropika', 'Narkotika', 'Daftar G'])->get();
		}
		$j_kecil = DetailPenjualanTmp::select(DB::raw("id_barang as id_bar, sum(jumlah_kecil) as jumlah"))->where('id_penjualan_barang', '=', $id)->groupBy('id_barang')->get();
		if (empty($dataMaster[0]->total)) {
			return view('farmasi/penjualanObat', compact('status', 'id_penjualan', 'dataMaster', 'detailPenjualan', 'dataObat', 'j_kecil', 'gudang', 'SubGrupObat'));
		} else {
			$request->session()->flash('alert-info', 'Pembelian Telah Selesai!');
			return redirect("FARMASI/masterPenjualan");
		}
	}

	public function tambahMasterPenjualan(Request $request)
	{
		if ($request->kat_penjualan == "Resep") {
			$id = "";
			$id = ResepLuar::insertGetId([
				'nama_pasien' => $request->nama_pasien,
				'nama_dokter' => $request->nama_dokter,
				'tanggal_resep' => $request->tanggal_resep,
			]);
			$data = new Penjualan;
			$data->kat_barang = 'Obat';
			$data->tanggal_penjualan = $request->tgl_jual;
			$data->tanggal_resep = $request->tanggal_resep;
			$data->id_gudang = $request->id_gudang_master;
			$data->kat_pembeli = $request->kat_pembeli;
			$data->id = Auth::user()->id;
			$data->id_resep = $id;
		} else {
			$data = new Penjualan;
			$data->kat_barang = 'Obat';
			$data->tanggal_penjualan = $request->tgl_jual;
			$data->tanggal_resep = $request->tanggal_resep;
			$data->id_gudang = $request->id_gudang_master;
			$data->kat_pembeli = $request->kat_pembeli;
			$data->id = Auth::user()->id;
		}
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return redirect("FARMASI/penjualanObat/".$data->id);
	}

	public function tambahPenjualan(Request $request)
	{	
		$data = new DetailPenjualanTmp;
		$data->id_penjualan_barang  = $request->id_penjualan;
		$data->id_barang            = $request->id_barang_penjualan;
		$data->satuan               = $request->satuan_penjualan;
		$data->jumlah               = $request->jumlah_penjualan;
		$data->jumlah_kecil         = $request->jumlah_kecil;
		$data->harga                = $request->harga_penjualan;
		$data->diskon_rp            = $request->diskonrp_penjualan;
		$data->diskon_rp1           = $request->diskon1_penjualan;
		$data->diskon_rp2           = $request->diskon2_penjualan;
		$data->biaya_resep          = $request->biaya_resep;
		$data->biaya_racik          = $request->biaya_racik;
		$data->sub_total            = $request->subtotal_penjualan;
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
			$permin = $request->j_kecil[$i];
			$data1 = Batch::where('id_barang', '=', $request->id_bar[$i])->whereRaw('qty_jual < qty')->orderBy('tgl_kadaluarsa')->get();
			$jml = 0;
			$jml2 = 0;
			$jml3 = 0;
			$index = 0;
			foreach ($data1 as $key => $val) {
				$jml += ($val->qty-$val->qty_jual);
				if ($permin > $jml) {
					$index++;
					$jml3+=($val->qty-$val->qty_jual);
				}else{
					break;
				}
			}
			if (isset($jml2)) {
				$jml2 = $data1[$index]->qty_jual+$permin-$jml3;
				for ($j=0; $j <= $index ; $j++) { 
					if ($j != $index) {
						$update = Batch::where('id_batch','=',$data1[$j]->id_batch)->update(['qty_jual' => $data1[$j]->qty]);
					}else{
						$update = Batch::where('id_batch','=',$data1[$j]->id_batch)->update(['qty_jual' => $jml2]);
					}
				}	
			}
			
		}
		if ($update) {
			$request->session()->flash('alert-info', 'Pembelian Berhasil Dilakukan!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return redirect("FARMASI/penjualanObat/");
	}

	// public function updateMasterPenjualan(Request $request)
	// {
	// 	$data = SettingTransaksi::where('jenis_transaksi', '=', 'Penjualan')->get();
	// 	$status_akun = Akun::where('id_akun', '=', $data[0]->id_akun)->get();
	// 	$dataMaster = Penjualan::where('id_penjualan_barang', '=', $request->id_penjualan_barang_master)->get();
	// 	$update = Penjualan::where('id_penjualan_barang','=', $request->id_penjualan_barang_master)->update([
	// 		'total'         => $request->total_semua,
	// 		'netto'         => $request->total_semua,
	// 		'jenis_bayar'   => 'Kredit',
	// 		]);
	// 	for ($i=0; $i < count($request->id_bar); $i++) { 
	// 		$update1 = MutasiBarang::where('id_gudang', '=', $request->id_gudang1)->where('id_barang', '=', $request->id_bar[$i])->increment('qty_penjualan', $request->j_kecil[$i]);
	// 	}
	// 	if ($update) {
	// 		$request->session()->flash('alert-info', 'Pembelian Berhasil Dilakukan!');
	// 	}else{
	// 		$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
	// 	}
	// 	return redirect("FARMASI/penjualanObat/");
	// }

	//It's New Ndry (28-07-2017)

	public function rekapPenjualan()
	{
		$data = Penjualan::where('total', '!=', 'NULL')->get();
		$totjual = MutasiBarang::select(DB::raw("sum(qty_penjualan) as total_jual"))->get();
		$totuangjual = Penjualan::select(DB::raw("sum(netto) as total_uang_jual"))->get();
		$transaksi = Penjualan::select(DB::raw("count(id_penjualan_barang) as total_transaksi"))->get();

		return view('farmasi/rekapPenjualan', compact('data','totjual','totuangjual','transaksi'));
	}

	public function detailRekapPenjualan($id)
	{
		$data = Penjualan::where('id_penjualan_barang', '=', $id)->get();

		// print_r($data);
		return view('farmasi/detail_rekapPenjualan', compact('data'));
	}

	public function hapusMasterPenjualan(Request $request, $id)
	{
		$hapus = Penjualan::where('id_penjualan_barang', '=', $id)->delete();

		if ($hapus) {
			$request->session()->flash('alert-info', 'Pembelian Berhasil Dilakukan!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		} 
		return back();
	}

	public function hapusDetailPenjualan($id)
	{
		$data = DetailPenjualanTmp::where('id_detail_penjualan', '=', $id);
		$data->delete();
		return back();
	}

	//End Of Baru

	//AutoComplete

	public function cariPasien(Request $request) {
		$query = $request->get('term','');

		$pasien = Pasien::where('nama','LIKE','%'.$query.'%')->get();

		$data=array();
		foreach ($pasien as $ps) {
			$data[]=array('value'=>$ps->nama,'id'=>$ps->no_rm);
		}
		if(count($data)) {
			return $data;
		} else {
			return ['value'=>'No Result Found','id'=>''];
		}
	}

	public function cariDokter(Request $request) {
		$query = $request->get('term','');

		$dokter = Dokter::where('nama','LIKE','%'.$query.'%')->get();

		$data=array();
		foreach ($dokter as $dk) {
			$data[]=array('value'=>$dk->nama,'id'=>$dk->id_dokter);
		}
		if(count($data)) {
			return $data;
		} else {
			return ['value'=>'No Result Found', 'id'=>''];
		}
	}

	public function cariCustomer(Request $request) {
		$query = $request->get('term','');

		$customer = Customer::where('nama_cust','LIKE','%'.$query.'%')->get();

		$data=array();
		foreach ($customer as $cu) {
			$data[]=array('value'=>$cu->nama_cust, 'id'=>$cu->id_customer);
		}
		if(count($data)) {
			return $data;
		} else {
			return ['value'=>'No Result Found', 'id' => ''];
		}
	}

	public function notaPenjualan($poli,$id)
	{
		$data = Penjualan::where('id_penjualan_barang', '=', $id)->get();
		$dataDetail = DetailPenjualan::where('id_penjualan_barang', '=', $data[0]->id_penjualan_barang)->get();
		return view('cetak/cetak_fakturpenjualan', compact('data', 'dataDetail'));
	}


	public function rekapPenjualanPerItem(){
		$data = DetailPenjualan::select(DB::raw("*, sum(jumlah_kecil) as totalqty"))->groupBy('id_barang','harga')->get();
		return view('farmasi/detail_rekapPenjualanPerItem', compact('data'));
	}
	//End Of AutoComplete
}
