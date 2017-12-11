<?php

namespace App\Http\Controllers\RawatInap;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\ViewDetailPasienRinap;
use App\Pasien;
use App\Pendaftaran;
use App\Kelas;
use App\DetailKamarInap;
use App\DetailPendaftaran;
use App\Kamar;
use App\JenisBarang;

use DB;

class DetailPasienRinap extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    

    public function dataPasien()
    {
        $data = ViewDetailPasienRinap::All();
        return view('rawatInap/dataPasien',compact('data'));
    }

    public function pilihKamar($id)
    {
        $data = DetailPendaftaran::where("id_detail_pendaftaran","=",$id)->get();
        // $data = DB::select('SELECT *, p.nama as nama_pasien FROM pasien p JOIN pendaftaran pen ON p.no_rm = pen.no_rm JOIN detail_pendaftaran dp ON pen.id_pendaftaran = dp.id_pendaftaran JOIN detail_kamar_inap dk ON dp.id_detail_pendaftaran = dk.id_detail_pendaftaran JOIN kamar k ON dk.id_kamar=k.id_kamar where pen.no_rm = ?', [$id]);
        // print_r($data);
        $dataKelas = Kelas::all();
        $dki = DetailKamarInap::where('id_detail_pendaftaran', '=', $id)->where('detail_status','=','aktif')->get();
        // print_r($dki);
        $jenis_sajian = JenisBarang::all();
        $data_rujukan = Pendaftaran::JOIN('detail_pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'detail_pendaftaran.id_pendaftaran')
                ->JOIN('poli', 'detail_pendaftaran.id_poli', '=', 'poli.id_poli')
                ->where('pendaftaran.no_rm', '=', $id)
                ->where('detail_pendaftaran.id_poli','>=','3')
                ->get();
        return view('rawatInap/utilitasKamar', compact('data','dataKelas', 'dki', 'data_rujukan','jenis_sajian'));
    }

    // public  function jsonPilihKamar(Request $request)
    // {
    //     if($request->ajax()){
    //         $id = $request->id;
    //         $data = DB::select('SELECT *, p.nama as nama_pasien FROM pasien p JOIN pendaftaran pen ON p.no_rm = pen.no_rm JOIN detail_pendaftaran dp ON pen.id_pendaftaran = dp.id_pendaftaran WHERE pen.id_pendaftaran = ?', [$id]);
    //         return response()->json($data);
    //     }
    // }

    public  function jsonPindahKamar(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $data = DB::select('SELECT *, p.nama as nama_pasien FROM pasien p JOIN pendaftaran pen ON p.no_rm = pen.no_rm JOIN detail_pendaftaran dp ON pen.id_pendaftaran = dp.id_pendaftaran WHERE pen.id_pendaftaran = ?', [$id]);
            return response()->json(compact('data'));
        }
    }

    public function pasienDirawat(Request $request)
    {
        $id = $request->id_detail;
        date_default_timezone_set("Asia/Jakarta");
        Kamar::where('id_kamar', '=', $request->id_kamar)->update([
            'status'                => 1,        
            ]);
        DetailPendaftaran::where('id_detail_pendaftaran', '=', $id)->update([
            'status'                => 'Dirawat',
            'id_dokter'             => $request->id_dokter,
            ]);
        DetailKamarInap::insert([
            'id_detail_pendaftaran' => $id,
            'id_kamar'              => $request->id_kamar,
            'tanggal_masuk'         => date('Y-m-d H:i:s'),
            'tanggal_keluar'        => 'null',
            'detail_status'         => 'aktif',
            ]);
        return back()
        ->with('success', 'Pasien berhasil di rawat');
    }   

    public function pindahKamar(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        DetailKamarInap::where('id_detail_pendaftaran', '=', $request->id_detail_pendaftaran)->where('detail_status','=','aktif')->update([
            'tanggal_keluar'        => date('Y-m-d H:i:s'),
            'detail_status'         => 'pindah',
            ]);
        DetailKamarInap::insert([
            'id_detail_pendaftaran' => $request->id_detail_pendaftaran,
            'id_kamar'              => $request->id_kamar,
            'tanggal_masuk'         => date('Y-m-d H:i:s'),
            'tanggal_keluar'        => 'null',
            'detail_status'         => 'aktif',
            ]);
        return back()
        ->with('success', 'Pasien berhasil di rawat');
    }

    
    public function diagnosaPasien($id)
    {
        $data = DB::select('SELECT *, p.nama as nama_pasien FROM pasien p JOIN pendaftaran pen ON p.no_rm = pen.no_rm JOIN detail_pendaftaran dp ON pen.id_pendaftaran = dp.id_pendaftaran JOIN rawat_inap ri ON dp.id_detail_pendaftaran = ri.id_detail_pendaftaran JOIN detail_kamar_inap dk ON ri.id_detail_pendaftaran = dk.id_detail_pendaftaran where p.no_rm = ?', [$id]);
        $dataKelas = Kelas::all();
        $dki = DetailKamarInap::join('kamar', 'kamar.id_kamar', '=', 'detail_kamar_inap.id_kamar')->where('id_rawat_inap', '=', $data[0]->id_rawat_inap)->where('detail_status','=','aktif')->get();
        $data_rujukan = Pendaftaran::JOIN('detail_pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'detail_pendaftaran.id_pendaftaran')
                ->JOIN('poli', 'detail_pendaftaran.id_poli', '=', 'poli.id_poli')
                ->where('pendaftaran.no_rm', '=', $id)
                ->where('detail_pendaftaran.id_poli','>=','3')
                ->where('status', '=', 'masuk')
                ->get();
        return view('rawatInap/diagnosaPasien', compact('data', 'data_rujukan'));
    }

    public function tambahRujukan(Request $request)
    {
        DetailPendaftaran::insert([
            'id_pendaftaran'    => $request->id_pendaftaran,
            'id_poli'           => $request->id_poli,
            'tgl_masuk'         => $request->tgl_masuk,
            'memo'              => $request->memo,
            ]);
        return back()
        ->with('success', 'Data Berhasil Ditambahkan');
    }

     public function pasienRWinap(){
       $data = Pasien::JOIN('pendaftaran', 'pendaftaran.no_rm', '=', 'pasien.no_rm')
       ->join('detail_pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'detail_pendaftaran.id_pendaftaran')
       ->join('detail_kamar_inap', 'detail_kamar_inap.id_detail_pendaftaran', '=', 'detail_pendaftaran.id_detail_pendaftaran')
       ->join('kelas', 'kelas.id_kelas', '=', 'detail_pendaftaran.id_kelas')
       ->join('kamar', 'detail_kamar_inap.id_kamar', '=', 'kamar.id_kamar')
       ->join('ruang', 'kamar.id_ruang', '=', 'ruang.id_ruang')
       ->where('detail_pendaftaran.id_poli','=','4')
       ->where('detail_pendaftaran.status', '=', 'Dirawat')
       ->where('detail_kamar_inap.detail_status', '=', 'aktif')
       ->select('detail_pendaftaran.id_detail_pendaftaran','pendaftaran.no_rm','pasien.nama as namapasien','pendaftaran.umur','kelas.nama_kelas','ruang.nama_ruang','kamar.nama')
       ->get();
        return json_encode($data);
    }
}