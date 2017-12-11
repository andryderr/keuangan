<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SettingTransaksi;
use App\Akun;

class SettingController extends Controller
{
	public function index()
	{
		$data = SettingTransaksi::All();
		$akun = Akun::All();
		return view('kasir/setting_transaksi', compact('data', 'akun'));
	}

	public function editSetting(Request $request)
	{
		$update = SettingTransaksi::where('id_setting_transaksi', '=', $request->id)->update(['id_akun' => $request->id_akun]);

		if ($update) {
			$request->session()->flash('alert-primary', 'Data Berhasil Diubah!');
		} else{
			$request->session()->flash('alert-warning', 'Data Gagal Diubah!');
		}

		return back();
	}
}
