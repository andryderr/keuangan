<?php

namespace App\Http\Controllers\RawatInap;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\ViewDetailKamar;
use App\Kelas;
use App\Ruang;
use App\Kamar;

use DB;

class DataKamar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Kelas
    public function dataKelas()
    {
         $data = DB::select("SELECT *,(select count(*) from ruang r where r.id_kelas = k.id_kelas ) as jumlah FROM `kelas` k where status = '1'");
        $totkamar = Kamar::select(DB::raw("count(id_kamar) as totalkamar"))->get();
        $kamartersedia = Kamar::select(DB::raw("count(id_kamar) as kamartersedia"))->where('status','=','0')->get();
        $kamarterpakai = Kamar::select(DB::raw("count(id_kamar) as kamarterpakai"))->where('status','=','1')->get();

        return view('rawatInap/dataKelas',compact('data','totkamar','kamartersedia','kamarterpakai'));
    }

    public function viewDataKelas(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $data = Kelas::select('*')
            ->where('id_kelas', '=', $id)
            ->get();
            return response()->json($data);
        }
    }

    public function tambahKelas(Request $request)
    {
        Kelas::insert([
            'id_kelas'      => $request->id_kelas,
            'nama_kelas'    => $request->nama_kelas,
            ]);
        return back()
        ->with('success','Data telah tersimpan.');
    }

    public function tambahRuang(Request $request)
    {
        Ruang::insert([
            'id_kelas'      => $request->id_kelas,
            'nama_ruang'    => $request->nama_ruang,
            ]);
        return back()
        ->with('success','Data telah tersimpan.');
    }

    public function tambahKamar(Request $request)
    {
        Kamar::insert([
            'id_ruang'      => $request->ruang_id,
            'nama'          => $request->nama,
            'status'        => $request->status,
            'harga'         => $request->harga,
            ]);
        return back()
        ->with('success','Data telah tersimpan.');
    }

    public function ubahKelas(Request $request){
        $id = $request -> edit_id;
        $data = Kelas::where('id_kelas', '=', $id)
        ->update([
            'nama_kelas' => $request->nama_kelas,
            ]);
        return back()
        ->with('success','Data telah di perbaharui');
    }

    public function hapusKelas($id){
        Kelas::where('id_kelas', $id)->update(['status' => 0]);
        return back()
        ->with('success', 'Data berhasil dihapus');
    }

    //Ruang
    public function dataRuang($id)
    {
        $data = DB::select("SELECT *,(select count(*) from kamar r where r.id_ruang = k.id_ruang AND r.status = '0') as jumlah FROM `ruang` k JOIN `kelas` ka ON k.id_kelas = ka.id_kelas where k.status = '1' and k.id_kelas = ?", [$id]);
        $id_kelas = DB::select('SELECT id_kelas FROM kelas where status = 1 and id_kelas = ?', [$id]);
        return view('rawatInap/dataKamar',compact('data', 'id_kelas'));
    }

    public function viewDataRuang(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $data = DB::select("SELECT * FROM `ruang` r JOIN `kelas` k ON r.id_kelas = k.id_kelas where r.status = '1' and k.status = '1' and id_ruang = ?", [$id]);
            // echo json_encode($data);
            return response()->json($data);
        }
    }

    public function ubahRuang(Request $request){
        $id = $request->edit_id;
        $data = Ruang::where('id_ruang', '=', $id)
        ->update([
            'nama_ruang' => $request->nama_ruang,
            ]);
        return back()
        ->with('success','Data telah di perbaharui');
    }

    public function hapusRuang($id){
        Ruang::where('id_ruang', $id)->update(['status' => 0]);
        return back()
        ->with('success', 'Data berhasil dihapus');
    }

    public function viewDataKamar($id)
    {
        $data = ViewDetailKamar::select('id_kamar', 'id_ruang', 'id_kelas', 'nama', 'nama_kelas','harga', 'status')
        ->where('id_ruang', '=', $id)
        ->groupBy('id_kamar')
        ->get();
        return json_encode($data);  
    }

     public function hapusKamar($id)
    {
        Kamar::where('id_kamar', $id)->update(['status_bisa' => 0]);
        return back()
        ->with('success', 'Data berhasil dihapus');
    }

    public function jsonRuang($id){
        $data = Ruang::where('id_kelas','=',$id)->get();
        return json_encode($data);
    }

    public function jsonKamar($id){
        $data = Kamar::where('id_ruang','=',$id)
        ->where('status', '=', 0)
        ->get();
        return json_encode($data);
    }

      public function ketersediaanKamar()
    {
        $kamar = DB::table('kelas')
        ->join('ruang', 'kelas.id_kelas', '=', 'ruang.id_kelas')
        ->join('kamar', 'ruang.id_ruang', '=', 'kamar.id_ruang')
        ->select('kelas.nama_kelas', 'kamar.*','ruang.nama_ruang')
        ->where('kelas.status','=','1')
        ->get();
        return json_encode($kamar);  
    }

    // SELECT *,(select count(*) from ruang r where r.id_kelas = k.id_kelas ) as jumlah FROM `kelas` k
}
