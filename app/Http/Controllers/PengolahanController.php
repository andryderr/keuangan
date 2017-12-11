<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

use App\Barang;
use App\MasterPengolahan;
use App\DetailPengolahan;


class PengolahanController extends Controller
{

    public function inputPengolahan(Request $request)
    {
        $inputMaster = MasterPengolahan::where('id_barang','=',$request->id_barang)->update([
            'id_barang' => $request->id_barang,
            'jumlah_sajian' => $request->jumlah_sajian,
            'tanggal_pengolahan' => $request->tgl_pengolahan,
            'id_pegawai' => $request->pegawai,
            'id_user' =>$request->pengguna,
            'total' =>$request->total
            ]);
        if ($inputMaster) {
            $request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
        }else{
           $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
       }
       return back()->with($status = 1);
   }

   public function inputDetailPengolahan(Request $request){
     $inputDetail  = DetailPengolahan::insert([
        'id_pengolahan' => $request->id_peng,
        'id_barang' => $request->namaBahan,
        'jumlah_barang_baku' =>$request->jumlah,
        'harga_bahan_baku' =>$request->harga,
        'subtotal' =>$request->subtotal
        ]);
     Barang::where('id_barang', '=', $request->namaBahan)->update([
        'stok'      => $request->stok,
        ]);
     if ($inputDetail){
        $request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
    }else{
        $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
    }
    return back();
}



public function dataBarang($id)
{
    $data = Barang::where('id_barang','=',$id)->get();
    $data1 = Barang::where('kat_barang','=','Bahan Baku')->where('stok', '>', '0')->get();
    $data2 = MasterPengolahan::where('id_barang','=',$id)->get();
    $dataBahanBaku = DetailPengolahan::where('id_pengolahan','=',$id)->get();
    $total = DetailPengolahan::select(DB::raw("sum(subtotal) as totalharga"))->where('id_pengolahan','=',$id)->get();
    return view('gizi/pengolahanSajian', compact('data','data1','data2','dataBahanBaku','total'));
}

public function jsonHarga($id){
    $data = Barang::where('id_barang','=',$id)->get();
    return json_encode($data);
}

public function inputTotal(Request $request){
 $inputTotal  = MasterPengolahan::where('id_barang','=',$request->id_barang)->update([
    'total' => $request->total,
    ]);

 Barang::where('id_barang','=',$request->id_barang)->update([
    'stok'  => $request->u_stok_barang,
    'harga' => ($request->total) / ($request->u_stok_barang),
    ]); 

 if ($inputTotal){
    $request->session()->flash('alert-info', 'Data Berhasil Di Kunci!');
}else{
   $request->session()->flash('alert-warning', 'Data Gagal Dikunci!');
}
return back();
}

public function hapusBahan(Request $request, $id){
    $data = DetailPengolahan::where('id_detail_pengolahan', $id);
    $hapus = $data->delete();
    if ($hapus){
        $request->session()->flash('alert-danger', 'Data Berhasil Di Hapus!');
    }else{
     $request->session()->flash('alert-warning', 'Data Gagal Hapus!');
 }
 return back();
}

}
