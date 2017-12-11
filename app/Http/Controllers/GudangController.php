<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Gudang;
use Auth;

class GudangController extends Controller
{

    public function index()
    {
        $data = Gudang::where('status', '=', 0)->get();
        $rt1 = Auth::user()->poli->prefix;
        if ($rt1 == 'GIZI') {
            return view('gizi/dataGudang',compact('data'));
        } elseif ($rt1 == 'FARMASI') {
            return view('farmasi/dataGudang',compact('data'));
        }
    }


    public function tambahGudang(Request $request)
    {
     $input = Gudang::insert([
        'nama_gudang'=>$request->namaGudang,
        'keterangan'=>$request->keterangan
        ]);
     if ($input) {
        $request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
    }else{
       $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
   }
   return back(); 
}


public function editGudang(Request $request)
{
    $edit = Gudang::where('id_gudang','=', $request->id_gudang)->update([
        'nama_gudang'=>$request ->nama_gudang,
        'keterangan'=>$request ->keterangan
        ]);
    if ($edit) {
        $request->session()->flash('alert-info', 'Data Berhasil Diubah!');
    }else{
       $request->session()->flash('alert-warning', 'Data Gagal Diubah!');
   }
   return back(); 
}

public function hapusGudang($poli,$id)
{
    $data = Gudang::where('id_gudang','=',$id);
    $data->update(['statur' => 1]);
    return back();
}
}
