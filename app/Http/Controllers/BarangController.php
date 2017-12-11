<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pembelian;
use App\DetailPembelian;
use App\DetailPembelianTmp;
use App\Barang;
use App\Supplier;
use App\Gudang;
use App\SubGrupObat;
use App\Batch;
use App\DetailBarang;
use Datatables;

use DB;

class BarangController extends Controller
{


	public function index($id)
	{
		// $data = Barang::where('id_jenis_barang','=',$id)->get();
		$data = Barang::join('pengolahan_barang_sajian', 'barang.id_barang', '=', 'pengolahan_barang_sajian.id_barang')->where('id_jenis_barang','=',$id)->get();
		$id_jb = $id;
		return view('gizi/dataSajian', compact('data','id_jb'));
	}

	public function tambahBarang(Request $request)
	{
		$data = new Barang;
		$data->nama_barang = $request->nama_barang;
		$data->id_supplier = $request->id_supplier_BB;
		$data->id_jenis_barang = $request->id_jenis_barang;
		$data->kat_barang = $request->kat_barang;
		$data->stok_minimal = $request->stok_minimal;
		$data->satuan1 = $request->satuan1;
		$data->satuan2 = $request->satuan2;
		$data->satuan3 = $request->satuan3;
		$data->satuan4 = $request->satuan4;
		$data->kapasitas2 = $request->kapasitas2;
		$data->kapasitas3 = $request->kapasitas3;
		$data->kapasitas4 = $request->kapasitas4;
		$data->satuan_turunan2 = $request->satuan_turunan2;
		$data->satuan_turunan3 = $request->satuan_turunan3;
		$data->satuan_turunan4 = $request->satuan_turunan4;
		$data->harga_awal = $request->hargaBahanBaru;
		$data->harga = $request->hargaBahanBaru;
		$data->HPP = $request->hargaBahanBaru;
		$data->harga_jual1 = $request->harga_jual1;
		$data->harga_jual2 = $request->harga_jual2;
		$data->harga_jual3 = $request->harga_jual3;
		$data->stok = 0;
		$data->id_subgrup = $request->id_subgrup;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

	public function tambahSajian(Request $request)
	{
		$input = Barang::insert([
			'nama_barang' => $request ->nama_barang,
			'id_jenis_barang' => $request ->id_jenis_barang,
			'kat_barang' => $request ->kategoriBarang
		]);
		if ($input) {
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back(); 
	}

	public function editBarang(Request $request)
	{
		$update = Barang::where('id_barang','=', $request->id_barang)->update([
			'nama_barang' => $request->namaSajian,
			'harga_jual1' => $request->hpp,
		]);
		if ($update) {
			$request->session()->flash('alert-info', 'Data Berhasil Diubah!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();   
	}

	public function hapusBarang($id)
	{
		$data = Barang::where('id_barang', $id);
		$data->delete();
		return back();
	}

	public function dataSatuan(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$data = Barang::where('id_barang', '=', $id)->get();
			return response()->json($data);
		}
	}


	public function stokBahanBaku()
	{
		$data = Barang::LEFTJOIN('gudang', 'gudang.id_gudang', '=', 'barang.id_gudang')->where('kat_barang', '=', 'Bahan Baku')->get();

		return view('gizi/stokBahanBaku', compact('data'));
	}
	//End Of Baru

	public function dataBarang($poli)
	{
		$dataBahanBaku = Barang::where('kat_barang', '=', 'Bahan Baku')->get();
		$dataBahanBaku1 = Barang::whereIn('barang.kat_barang', ['Obat', 'Alat Medis', 'Psikotropika', 'Narkotika', 'Daftar G'])->get();
        // print_r($poli);
		if ($poli == "FARMASI") {
			return Datatables::of($dataBahanBaku1)->addColumn('aksi', function ($dataBahanBaku1) {
				return "<a href='#' onclick='setSubtotal(".$dataBahanBaku1->id_barang.");'><button type='button' class='btn btn-primary'><i class='glyphicon glyphicon-check'></i></button></a>";
			})->make(true);
		} else {
			return Datatables::of($dataBahanBaku)->make(true);
		}
	}

	public function semuaObat()
	{
		$obatBebas = Barang::whereIn('barang.kat_barang', ['Obat', 'Alat Medis', 'Psikotropika', 'Narkotika', 'Daftar G'])->get();
		return Datatables::of($obatBebas)->addColumn('aksi', function($obatBebas){
			return "<a href='#'><button type='button' data-toggle='modal' data-target='#editBarang' onclick='setBarang(".$obatBebas->id_barang.");' class='btn btn-warning'><i class='fa fa-edit'></i></button></a>
			<a href='/FARMASI/Obat/hapus/".$obatBebas->id_barang."'><button type='button' data-toggle='modal' data-target='#editBarang' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>";
		})->make(true);
	}

	public function obatAlkes()
	{
		$obatAlkes = Barang::leftjoin('subgrup_obatmedis', 'barang.id_subgrup', '=', 'subgrup_obatmedis.id_subgrup')->leftjoin('grup_obatmedis', 'grup_obatmedis.id_grup', '=', 'subgrup_obatmedis.id_grup')->where('kat_barang', '=', 'Alat Medis')->get();
		return Datatables::of($obatAlkes)->addColumn('aksi', function($obatAlkes){
			return "<a href='#'><button type='button' data-toggle='modal' data-target='#editBarang' onclick='setBarang(".$obatAlkes->id_barang.");' class='btn btn-warning'><i class='fa fa-edit'></i></button></a>";
		})->make(true);
	}

	public function dataBarang1($id)
	{
		$data = Barang::where('id_barang', '=', $id)->get();
		return json_encode($data);  
	}

	public function dataObat(){
		$SubGrupObat = SubGrupObat::All();

		return view('farmasi/obat', compact('SubGrupObat'));
	}

	public function jsonBarang($id){
		$editobat = Barang::where('id_barang','=',$id)->get();
		return json_encode($editobat);
	}

	public function editObatAlkes(Request $request)
	{
		$update = Barang::where('id_barang','=', $request->id_barang)->update([
			'nama_barang' => $request->nama_barang,
			'id_jenis_barang' => $request->id_jenis_barang,
			'kat_barang' => $request->kat_barang,
			'stok_minimal' => $request->stok_minimal,
			'satuan1' => $request->satuan1,
			'satuan2' => $request->satuan2,
			'satuan3' => $request->satuan3,
			'satuan4' => $request->satuan4,
			'kapasitas2' => $request->kapasitas2,
			'kapasitas3' => $request->kapasitas3,
			'kapasitas4' => $request->kapasitas4,
			'satuan_turunan2' => $request->satuan_turunan2,
			'satuan_turunan3' => $request->satuan_turunan3,
			'satuan_turunan4' => $request->satuan_turunan4,
			'harga_awal' => $request->hargaBahanBaru,
			'harga' => $request->hargaBahanBaru,
			'HPP' => $request->hargaBahanBaru,
			'harga_jual1' => $request->harga_jual1,
			'harga_jual2' => $request->harga_jual2,
			'harga_jual3' => $request->harga_jual3,
			'id_subgrup' => $request->id_subgrup
		]);
		if ($update) {
			$request->session()->flash('alert-info', 'Data Berhasil Diubah!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();   
	}
}
