<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\JenisBarang;

class JenisBarangController extends Controller
{
    public function index()
    {
        $data = JenisBarang::where('kat_barang', '=', 'Gizi')->get();
        return view('gizi/jenisSajian', compact('data'));
    }

    public function tambahJenisSajian(Request $request)
    {
            $input = JenisBarang::insert([
                'jenis_barang' => $request ->namaJenisSajian,
                'kat_barang' => $request ->kategoriBarang,
                ]);
        if ($input) {
            $request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
        }else{
           $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
       }
       return back();      
   }


   public function editJenisSajian(Request $request)
   {
    $update = JenisBarang::where('id_jenis_barang','=', $request->idJenisBarang)->update([
        'jenis_barang' => $request ->namaJenisSajian,
        'kat_barang' => $request ->kategoriBarang,
        ]);
    if ($update) {
        $request->session()->flash('alert-info', 'Data Berhasil Diubah!');
    }else{
       $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
   }
   return back();   

}

    public function hapusJenisSajian($id)
    {
        $data = JenisBarang::where('id_jenis_barang', $id);
        $data->delete();
        return back();
    }
}
