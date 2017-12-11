<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SubGrupObat;
use App\GrupObat;
use App\Barang;

class SubGrupLogistikController extends Controller
{
	public function index($id)
	{
		$data = SubGrupObat::where('id','=',$id)->get();
		$dataGrup = GrupObat::where('id','=',$id)->get();
		$id_sub = $id;
		return view('logistik/sub_grupLogistik', compact('data','id_sub','dataGrup'));
	}

	public function tambahSubGrupLogistik(Request $request){
		$input = SubGrupObat::insert([
			'id'=>$request->id_grup,
			'nama_subgrup'=>$request->nama_subgrup,
			'kat_subgrup'=>$request->kat_subgrup,
			'keterangan'=>$request->keterangan
			]);
		if ($input) {
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();      
	}

	public function editSubGrupLogistik(Request $request)
	{
		$edit = SubGrupObat::where('id_subgrup','=',$request->id_subgrup)->update([
			'id'=>$request->id_grup,
			'nama_subgrup'=>$request->nama_subgrup,
			'kat_subgrup'=>$request->kat_subgrup,
			'keterangan'=>$request->keterangan
			]);
		if ($edit) {
			$request->session()->flash('alert-info', 'Data Berhasil Diubah!');
		}else{
			$request->session()->flash('alert-warning', 'Data Gagal Diubah!');
		}
		return back(); 
	}

	public function hapusSubGrupLogistik($id, Request $request)
	{
		$data = SubGrupObat::where('id_subgrup', $id);
		$hapus = $data->delete();
		if ($hapus) {
			$request->session()->flash('alert-warning', 'Data Berhasil Dihapus!');
		}else{
			$request->session()->flash('alert-danger', 'Data Gagal Dihapus!');
		}
		return back(); 
	}

	public function jsonDetailSubgrupLogistik(Request $request){
		if($request->ajax()){
			$id = $request->id;
			$data = Barang::where('id_subgrup','=',$id)->where('kat_barang','=','Logistik')->get();
			return response()->json($data);
		}
	}


}
