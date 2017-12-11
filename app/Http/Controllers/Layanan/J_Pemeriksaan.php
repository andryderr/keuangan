<?php

namespace App\Http\Controllers\Layanan;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\JenisPemeriksaan;
use App\DetailJenisPemeriksaan;
use App\DetailPemeriksaan;
use App\DetailPendaftaran;
use App\HasilPemeriksaan;
use App\Pemeriksaan;
use Auth;

use DB;

class J_Pemeriksaan extends Controller
{

    public function index($poli)
    {
        // if ($poli == "LABORATORIUM") {
        //     $data = JenisPemeriksaan::All();
        // } else if ($poli == "") {
        //     # code...
        // }
        $data = JenisPemeriksaan::where('jenis_layanan','=',Auth::user()->poli->nama_poli)->get();
        return view('layanan.jenisPemeriksaan', compact('data'));
    }

    public function index2(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $data = JenisPemeriksaan::where('id_jenis_pemeriksaan', '=', $id)->get();
            return response()->json($data);
        }
    }

    public function index3()
    {
        $data = JenisPemeriksaan::All();
        return response()->json($data);
    }

    public function tambahJenisPemeriksaan(Request $request)
    {  
        JenisPemeriksaan::insert([
            'nama_jenis_pemeriksaan'    => $request->nama_jenis_pemeriksaan,
            'keterangan'                => $request->keterangan,
            'harga_pemeriksaan'         => $request->harga_pemeriksaan,
            'jenis_layanan'             => $request->jenis_layanan,
        ]);
        return back()
        ->with('success', 'Data Berhasil Disimpan');
    }

    public function editJenisPemeriksaan(Request $request)
    {  
        JenisPemeriksaan::where('id_jenis_pemeriksaan', '=', $request->id_pemeriksaan)
        ->update([
            'nama_jenis_pemeriksaan'    => $request->nama_pemeriksaan,
            'keterangan'                => $request->ket,
            'harga_pemeriksaan'         => $request->harga,
            'jenis_layanan'             => $request->jenis_layanan,
        ]);
        return back()
        ->with('success', 'Data Berhasil Disimpan');
    }

    public function hapusJenisPemeriksaan($poli,$id)
    {
        JenisPemeriksaan::where('id_jenis_pemeriksaan',"=", $id)->delete();
        return back()
        ->with('success', 'Data Berhasil Dihapus');
    }

    public function simpanDetailJP(Request $request)
    {
        DetailJenisPemeriksaan::insert([
            'id_jenis_pemeriksaan'      => $request->id_jp,
            'detail_pemeriksaan'        => $request->det_pemeriksaan,
            'nilai_normal'              => $request->nilai_normal,
        ]);
        return back()
        ->with('success', 'Data Berhasil Disimpan');
    }

    public function detailJenisPemeriksaan($poli, $id)
    {
        $data = DetailJenisPemeriksaan::where('id_jenis_pemeriksaan', '=', $id)->get();
        if (count($data) > 0) {
            return view('layanan.detailPemeriksaan', compact('data', 'id'));
        } else {
            return view('layanan.detailPemeriksaan', compact('data', 'id'));
        }
    }

    public function detailJenisPemeriksaan1($poli, Request $request)
    {
        // if ($request->ajax()) {
        $id = $request->id;
        $data = DetailJenisPemeriksaan::join('hasil_pemeriksaan', 'hasil_pemeriksaan.id_detail_jenis_pemeriksaan', '=', 'detail_jenis_pemeriksaan.id_detail_jenis_pemeriksaan')->where('id_detail_pemeriksaan', '=', $id)->get();
            // dd($data);
        //     return response()->json($data);
        // }
        return json_encode($data);
    }

    public function hapusDetailJP($poli,$id)
    {
        DetailJenisPemeriksaan::where('id_detail_jenis_pemeriksaan',"=", $id)->delete();
        return back()
        ->with('success', 'Data Berhasil Dihapus');
    }

    public function hapusDetailPemeriksaan($poli,$id)
    {
        DetailPemeriksaan::where('id_detail_pemeriksaan', $id)->delete();
        return back()
        ->with('success', 'Data Berhasil Dihapus');
    }

    public function simpanCheckbox(Request $request)
    {
        // print_r($request["jenis_pemeriksaan"]);
        $data = array();
        foreach ($request["jenis_pemeriksaan"] as $key) {
            $data1 = array();
            $data1['id_jenis_pemeriksaan'] = $key;
            $data1['id_pemeriksaan'] = $request->id_pemeriksaan;
            array_push($data, $data1);
        }
        DetailPemeriksaan::insert($data);
        return back()
        ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function simpanHasilPemeriksaan(Request $request)
    {
        $size = count($request["hasilPemeriksaan"]);
        for ($i=0; $i < $size; $i++) { 
            HasilPemeriksaan::where('id_detail_pemeriksaan', '=', $request->id_detail_pemeriksaan[$i])
            ->where('id_detail_jenis_pemeriksaan', '=', $request->id_detail_jenis_pemeriksaan[$i])
            ->update([
                'hasil' => $request->hasilPemeriksaan[$i],
            ]);
        }
        return back()
        ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function hasilPemeriksaan($poli,$id){
        $data = Pemeriksaan::where("id_pemeriksaan","=",$id)->get();
        // printf($data);
        return view("layanan/lihatHasilPemeriksaan",compact('data'));
    }

    public function dataDetailJenisPemeriksaan($poli, $id)
    {
        $data = DetailJenisPemeriksaan::where('id_detail_jenis_pemeriksaan', '=', $id)->get();
        return json_encode($data);  
    }

    public function editDetailJenisPemeriksaan($poli, Request $request)
    {
        $data = DetailJenisPemeriksaan::where('id_detail_jenis_pemeriksaan', '=', $request->id_detail_jenis_pemeriksaan)->update([
            'detail_pemeriksaan'    => $request->detail_pemeriksaan,
            'nilai_normal'          => $request->nilai_normal
        ]);
        if ($data) {
            $request->session()->flash('alert-info', 'Data Berhasil Diubah!');
        }else{
            $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
        }
        return back();
    }
    
    public function updateMasterPemeriksaan($poli, $id, Request $request)
    {
        $data = DetailPemeriksaan::where('id_pemeriksaan', '=', $request->id_pemeriksaan)->get();
        $tgl_kel = substr($request->tgl_hasil, 0, 10);
        if (count($data) > 0) {
            $data1 = DetailPendaftaran::where('id_detail_pendaftaran', '=', $id);
            $data1->update([
                'status'        => 'Keluar',
                'tgl_keluar'    => $request->tgl_hasil,
            ]);
            $data2 = Pemeriksaan::where('id_pemeriksaan', '=', $request->id_pemeriksaan)->where('id_detail_pendaftaran', '=', $id);
            $data2->update([
                'tanggal_hasil' => $tgl_kel
            ]);

            return redirect(Auth::user()->poli->prefix.'/dataPasien/pasienDirawat');
        } else {
            $request->session()->flash('alert-info', 'Gagal Update Master, Harap isi pemeriksaan terlebih dahulu');
            return back();
        }
    }
}