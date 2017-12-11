<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Penjualan;
use App\DetailPenjualan;
use App\Barang;

class LaporanObatKhususController extends Controller
{
	function getDataPenjualanPsikotropika(){
		$psiko = DB::table('penjualan_barang')
		->join('detail_penjualan', 'penjualan_barang.id_penjualan_barang', '=', 'detail_penjualan.id_penjualan_barang')
		->join('barang', 'detail_penjualan.id_barang', '=', 'barang.id_barang')
		->join('pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'penjualan_barang.id_pendaftaran')
		->join('pasien', 'pasien.no_rm', '=', 'pendaftaran.no_rm')
		->join('dokter', 'penjualan_barang.id_dokter', '=', 'dokter.id_dokter')
		->where('barang.kat_barang', '=', 'Psikotropika')
		->select('penjualan_barang.*', 'pasien.*', 'dokter.nama as nama_dokter', 'detail_penjualan.*','barang.*')
		->get();

		$narkotik = DB::table('penjualan_barang')
		->join('detail_penjualan', 'penjualan_barang.id_penjualan_barang', '=', 'detail_penjualan.id_penjualan_barang')
		->join('barang', 'detail_penjualan.id_barang', '=', 'barang.id_barang')
		->join('pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'penjualan_barang.id_pendaftaran')
		->join('pasien', 'pasien.no_rm', '=', 'pendaftaran.no_rm')
		->join('dokter', 'penjualan_barang.id_dokter', '=', 'dokter.id_dokter')
		->where('barang.kat_barang', '=', 'Narkotika')
		->select('penjualan_barang.*', 'pasien.*', 'dokter.nama as nama_dokter','detail_penjualan.*','barang.*')
		->get();

		$daftarg = DB::table('penjualan_barang')
		->join('detail_penjualan', 'penjualan_barang.id_penjualan_barang', '=', 'detail_penjualan.id_penjualan_barang')
		->join('barang', 'detail_penjualan.id_barang', '=', 'barang.id_barang')
		->join('pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'penjualan_barang.id_pendaftaran')
		->join('pasien', 'pasien.no_rm', '=', 'pendaftaran.no_rm')
		->join('dokter', 'penjualan_barang.id_dokter', '=', 'dokter.id_dokter')
		->where('barang.kat_barang', '=', 'Prekursor Farmasi')
		->select('penjualan_barang.*', 'pasien.*', 'dokter.nama as nama_dokter','detail_penjualan.*','barang.*')
		->get();

		$obatT = DB::table('penjualan_barang')
		->join('detail_penjualan', 'penjualan_barang.id_penjualan_barang', '=', 'detail_penjualan.id_penjualan_barang')
		->join('barang', 'detail_penjualan.id_barang', '=', 'barang.id_barang')
		->join('pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'penjualan_barang.id_pendaftaran')
		->join('pasien', 'pasien.no_rm', '=', 'pendaftaran.no_rm')
		->join('dokter', 'penjualan_barang.id_dokter', '=', 'dokter.id_dokter')
		->where('barang.kat_barang', '=', 'Obat Tertentu')
		->select('penjualan_barang.*', 'pasien.*', 'dokter.nama as nama_dokter','detail_penjualan.*','barang.*')
		->get();

		return view('farmasi/laporan_narkotika', compact('psiko','narkotik','daftarg', 'obatT'));
	}

	public function detailLaporanObatKhusus($id){
		$master = Penjualan::where('id_penjualan_barang','=',$id)->get();
		$detail = DB::table('detail_penjualan')
		->join('barang', 'detail_penjualan.id_barang', '=', 'barang.id_barang')
		->where('detail_penjualan.id_penjualan_barang', '=', $id)
		->whereIn('barang.kat_barang', ['Psikotropika', 'Narkotika', 'Daftar G'])->get();
		return view('farmasi/detail_laporanObatKhusus', compact('master','detail'));
	}
}