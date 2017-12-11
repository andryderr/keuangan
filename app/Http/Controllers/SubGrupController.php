<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SubGrupObat;
use App\GrupObat;
use App\Barang;

class SubGrupController extends Controller
{
   public function index($poli,$id)
   {
    $data = SubGrupObat::where('id_grup','=',$id)->get();
    $dataGrup = GrupObat::where('id_grup','=',$id)->get();
    $id_sub = $id;
    $SubGrupObat = SubGrupObat::where('id_grup','=',$id)->get();
    return view('farmasi/sub_grupObat', compact('data','id_sub','dataGrup', 'SubGrupObat'));
}

public function viewDataObat(Request $request)
{
    if($request->ajax()){
        $id = $request->id;
        $data = Barang::where('id_subgrup', '=', $id)->get();
        return response()->json($data);
    }
}

public function tambahSubGrup(Request $request){
    $input = SubGrupObat::insert([
        'id_grup'=>$request->id_grup,
        'nama_subgrup'=>$request->nama_subgrup,
        'kat_subgrup'=>$request->kategori_subgrup,
        'keterangan'=>$request->keterangan
    ]);
    if ($input) {
        $request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
    }else{
        $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
    }
    return back();      
}

public function editSubGrup(Request $request)
{
    $edit = SubGrupObat::where('id_subgrup','=',$request->id_subgrup)->update([
     'id_grup'=>$request->id_grup,
     'nama_subgrup'=>$request->nama_subgrup,
     'kat_subgrup'=>$request->kategori_subgrup,
     'keterangan'=>$request->keterangan
 ]);
    if ($edit) {
        $request->session()->flash('alert-info', 'Data Berhasil Diubah!');
    }else{
       $request->session()->flash('alert-warning', 'Data Gagal Diubah!');
   }
   return back(); 
}

public function hapusSubGrup($id, Request $request)
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
}
