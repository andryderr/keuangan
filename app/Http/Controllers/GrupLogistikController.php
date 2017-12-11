<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\GrupObat;

class GrupLogistikController extends Controller
{
	public function index()
	{
		$data = GrupObat::where('kat_grup', '=', 'Logistik')->get();
		return view('logistik/grupLogistik',compact('data'));
	}

	public function tambahGrupLogistik(Request $request)
	{
		$data = new GrupObat;
		$data->nama_grup = $request->nama_grup;
		$data->kat_grup = $request->kat_grup;
		$data->keterangan = $request->keterangan;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Grup Berhasil Ditambahkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Grup Gagal Ditambahkan!');
		}
		return back();
	}

	public function editGrupLogistik(Request $request)
	{
		$edit = grupObat::where('id','=',$request->id_grup)->update([
			'nama_grup'=>$request->nama_grup,
			'kat_grup'=>$request->kat_grup,
			'keterangan'=>$request->keterangan
			]);
		if ($edit) {
			$request->session()->flash('alert-info', 'Data Berhasil Diubah!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Diubah!');
		}
		return back(); 
	}

	public function hapusGrupLogistik($id, Request $request)
	{
		$data = grupObat::where('id', $id);
		$hapus = $data->delete();
		if ($hapus) {
			$request->session()->flash('alert-warning', 'Data Berhasil Dihapus!');
		}else{
			$request->session()->flash('alert-danger', 'Data Gagal Dihapus!');
		}
		return back(); 
	}
}
