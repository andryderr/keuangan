<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Posting;
use Auth;

trait PostingController
{

	public function posting(Request $request, $id_transaksi, $nama_transaksi, $tgl_transaksi, $keterangan, $jum, $jum2, $jum3, $jum4)
	{
		$data = new Posting;
		$data->id_transaksi = $id_transaksi;
		$data->nama_transaksi = $nama_transaksi;
		$data->tgl_transaksi = $tgl_transaksi;
		$data->keterangan = $keterangan;
		$data->jumlah = $jum;
		$data->jumlah2 = $jum2;
		$data->jumlah3 = $jum3;
		$data->jumlah4 = $jum4;
		$data->id = Auth::user()->id;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

}
