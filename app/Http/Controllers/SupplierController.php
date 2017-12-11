<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Supplier;


class SupplierController extends Controller
{

    public function index($poli)
    {   

        if ($poli == 'GIZI') {
            $data = Supplier::where('dept', '=', 'Bahan Baku')->get();
            return view('gizi/kelolaSuplier', compact('data'));
        } elseif ($poli == 'FARMASI') {
            $data = Supplier::where('dept', '=', 'Farmasi')->get();
            return view('farmasi/kelolaSuplier', compact('data'));
        } elseif ($poli == 'LOGISTIK') {
            $data = Supplier::where('dept', '=', 'Logistik')->get();
            return view('logistik/kelolaSuplier', compact('data','poli'));
        }
    }

    public function tambahSupplier(Request $request)
    {
        $insert = Supplier::insert([
            'nama_supplier'     => $request->nama_supplier,
            'alamat'            => $request->alamat,
            'no_telp'           => $request->no_telp,
            'no_hp'             => $request->no_hp,
            'email'             => $request->email,
            'contact_person'    => $request->cp,
            'dept'              => $request->dept,
            ]);
        if ($insert) {
            $request->session()->flash('alert-info', 'Data Berhasil Ditambah!');
        } else{
            $request->session()->flash('alert-warning', 'Data Gagal Ditambahkan!');
        }
        return back();
    }

    public function ubahSupplier(Request $request)
    {
        $update = Supplier::where('id_supplier', '=', $request->id_supplier)->update(['nama_supplier'     => $request->nama_supplier1,'alamat'            => $request->alamat1,'no_telp'           => $request->no_telp1,'no_hp'             => $request->no_hp1,'email'             => $request->email1,'contact_person'    => $request->cp1]);
        if ($update) {
            $request->session()->flash('alert-info', 'Data Berhasil Diubah!');
        } else{
            $request->session()->flash('alert-warning', 'Data Gagal Diubah!');
        }
        return back();
    }

    public function hapusSupplier(Request $request, $poli,$id)
    {
        echo $id;
        $delete = Supplier::where('id_supplier', '=', $id)->delete();
        if ($delete) {
          $request->session()->flash('alert-danger', 'Data Berhasil Dihapus!');
      } else{
        $request->session()->flash('alert-warning', 'Data Gagal Dihapus!');
    }
    return back();
    }
}
