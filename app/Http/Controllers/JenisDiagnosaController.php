<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\JenisDiagnosa;

use App\DetailDiagnosa;

class JenisDiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($_GET['search'])) {
         $data = JenisDiagnosa::where("nama_diagnosa",'LIKE','%'.$request->search.'%')->orWhere("kode",'LIKE','%'.$request->search.'%')->paginate(15);
     }else{
         $data = JenisDiagnosa::paginate(15); 
     }
     return view('new.igd/jenisDiagnosa',compact('data'));
 }

 public function tambahDetail(Request $request,$poli,$id){
    $data = array();
    foreach ($request->pilihan as $key => $value) {
        $r = ['id_detail_pendaftaran' => $id,'id_diagnosa' => $value];
        array_push($data,$r);
    }
    DetailDiagnosa::insert($data);
    return back();
}

public function hapusDetail($poli,$id){
    $data = DetailDiagnosa::where('id_detail_diagnosa','=',$id);
    $data->delete();
    return back();
}

public function store(Request $request)
{
        // print_r($request->toArray());
    $data = new JenisDiagnosa;
    $data->kode = $request->kode_diagnosa;
    $data->nama_diagnosa = $request->nama_diagnosa;
    $data->keterangan = $request->keterangan;
    try {
        $data->save();
        $request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
    } catch (Exception $e) {
        $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
    }
    return back();
}

public function update(Request $request)
{
    $simpan = JenisDiagnosa::where('id_diagnosa','=',$request->id_diagnosa);
    $simpan->update([
        'nama_diagnosa' => $request->nama_diagnosa,
        'kode'  => $request->kode_diagnosa,
        'keterangan' =>$request->keterangan]);
    if ($simpan) {
        $request->session()->flash('alert-info', 'Data Berhasil Diubah!');
    }else{
        $request->session()->flash('alert-warning', 'Data Gagal Diubah!');
    }
    return back();
}

public function showList(Request $request){
    $search = '';
    if(isset($request['search'])) {
        $search = $request->search;
        $data = JenisDiagnosa::where("nama_diagnosa",'LIKE','%'.$request->search.'%')->orWhere("kode",'LIKE','%'.$request->search.'%')->paginate(15);
        $next_page_url = $data->appends(['search' => $search])->nextPageUrl();
        $previous_page_url = $data->appends(['search' => $search])->previousPageUrl();
    }else{
        $data = JenisDiagnosa::paginate(15);
        $next_page_url = $data->nextPageUrl();
        $previous_page_url = $data->previousPageUrl();
    }
    $last_page = $data->lastPage();
    $current_page = $data->currentPage();
    $out = array();
    $i = 0;
    foreach ($data as $key => $row) {
        $out[$i++] = "<tr><td>$row->id_diagnosa</td><td>$row->kode</td><td>$row->nama_diagnosa</td><td><input type='radio' id='pilihDiagnosa' name='pilihan[]' value='$row->id_diagnosa' class='flat-red'></td></tr>";
    }
    return json_encode(compact('next_page_url','previous_page_url','last_page','current_page','search','out'));
}

public function destroy($poli,$id, Request $request)
{
    $hapus = JenisDiagnosa::where('id_diagnosa','=',$id);
    $hapus->delete();
    if ($hapus) {
        session()->flash('alert-danger', 'Data Berhasil Dihapus!');
    }else{
        session()->flash('alert-warning', 'Data Gagal Dihapus!');
    }
    return back();
}
}
