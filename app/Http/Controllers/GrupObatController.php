<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\GrupObat;

class GrupObatController extends Controller
{

    public function index()
    {
        $data = GrupObat::All();
        return view('farmasi/grupObat',compact('data'));
    }


    public function tambahGrup(Request $request)
    {
        $input = GrupObat::insert([
            'nama_grup'=>$request->nama_grup,
            'kat_grup'=>$request->kat_grup,
            'keterangan'=>$request->keterangan
            ]);
        if ($input) {
            $request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
        }else{
         $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
     }
     return back(); 
 }


 public function editGrup(Request $request)
 {
    $edit = grupObat::where('id_grup','=',$request->id_grup)->update([
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

public function hapusGrup($id, Request $request)
{
    $data = grupObat::where('id_grup', $id);
    $hapus = $data->delete();
    if ($hapus) {
        $request->session()->flash('alert-warning', 'Data Berhasil Dihapus!');
    }else{
     $request->session()->flash('alert-danger', 'Data Gagal Dihapus!');
 }
 return back(); 
}
}
