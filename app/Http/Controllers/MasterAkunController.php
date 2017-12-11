<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterAkun;
use Alert;

class MasterAkunController extends Controller
{
	function masterAkun(){
		$data = MasterAkun::all();
		return view('kasir/master_akun',compact('data'));
	}

	function tambahMasterAkun(Request $request){
		$data = new MasterAkun;
		$data->no_akun = $request->no_akun;
		$data->nama_akun = $request->nama_akun;
		$data->so_normal = $request->so_normal;
		$data->keterangan = $request->keterangan;
		$data->level = $request->level;
		$data->so_akun = str_replace(".","",$request->so_akun);
		try {
			$data->save();
			$request->session()->flash('alert-success', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

	function editMasterAkun(Request $request){
		$data = MasterAkun::where('no_akun','=',$request->no_akun);
		$dat = new MasterAkun;
		$dat->nama_akun = $request->nama_akun;
		$dat->so_normal = $request->so_normal;
		$dat->keterangan = $request->keterangan;
		$dat->level = $request->level;
		$dat->so_akun = str_replace(".","",$request->so_akun);
		try {
			$data->update($dat->toArray());			
			Alert::success('Data Berhasil Diubah!')->persistent("Close");
			// $request->session()->flash('alert-info', 'Data Berhasil Dirubah!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dirubah!');
		}
		return back();
	}

	function hapusMasterAkun($id,Request $request){
		$data = MasterAkun::where('no_akun','=',$id);
		try {
			$data->delete();			
			$request->session()->flash('alert-info', 'Data Berhasil Dihapus!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dihapus!');
		}
		return back();
	}
}
