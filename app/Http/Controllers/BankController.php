<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\BankKeluar;
use App\BankMasuk;
use App\Akun;

class BankController extends Controller
{
	public function index()
	{
		$bankmasuk = BankMasuk::all();
		$bankkeluar = BankKeluar::all();
			$akun = Akun::where('status_akun','=','Bank')->get();
		return view('kasir/bank_masuk_keluar', compact('akun', 'bankmasuk', 'bankkeluar'));
	}

	public function tambahBankMasuk(Request $request)
	{
		$jml = str_replace(".", "",$request->jumlahuang);
		$status_akun = Akun::select('status_akun')->where('id_akun', '=', $request->akun)->get();
		$data = new BankMasuk;
		$data->id_transaksi = 0;
		$data->tgl_bank = $request->tgl_bank;
		$data->id 		= $request->user;
		$data->id_akun = $request->akun;
		$data->jumlah_bayar = $jml;
		$data->keterangan = $request->keterangan;
		$data->jenis_transaksi = "Bank Masuk";
		$data->status_akun = $status_akun[0]->status_akun;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

	public function tambahBankKeluar(Request $request)
	{
		$jml = str_replace(".", "",$request->jumlahuang);
		$data = new BankKeluar;
		$data->tgl_bank = $request->tgl_bank;
		$data->id 		= $request->user;
		$data->id_akun = $request->akun;
		$data->jumlah_bayar = $jml;
		$data->jenis_transaksi = "Bank Keluar";
		$data->keterangan = $request->keterangan;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

	public function dataBarang($poli)
    {
        $dataBahanBaku = Barang::where('kat_barang', '=', 'Bahan Baku')->get();
        $dataBahanBaku1 = Barang::whereIn('barang.kat_barang', ['Obat', 'Alat Medis', 'Psikotropika', 'Narkotika', 'Daftar G'])->get();
        $pasien = Pasien::All();
        if ($poli == "FARMASI") {
            return Datatables::of($dataBahanBaku1)->addColumn('aksi', function ($dataBahanBaku1) {
                return "<a href='#' onclick='setSubtotal(".$dataBahanBaku1->id_barang.");'><button type='button' class='btn btn-primary'><i class='glyphicon glyphicon-check'></i></button></a>";
            })->make(true);
        } else {
            return Datatables::of($dataBahanBaku)->make(true);
        }
    }

    public function dataBarang1($id)
    {
        $data = Barang::where('id_barang', '=', $id)->get();
        return json_encode($data);  
    }
}
