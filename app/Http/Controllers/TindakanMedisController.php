<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TindakanMedis;

use App\TindakanMedisDokter;

use App\TindakanMedisPetugas;

use App\DetailPendaftaran;

use App\Kelas;

use App\DetailMedisKelas;

use App\Dokter;

use App\PetugasMedis;

use App\SubJasa;

use App\DetailSubMedisKelas;


class TindakanMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TindakanMedis::All();
        return view('new.igd.jenisTindakanMedis',['data' => $data]);
    }

    public function kelas($poli,$id){
        $data = DetailMedisKelas::where('id_tm_d_p','=',$id)->get();
        $dataKelas = Kelas::all();
        return view('new.igd.dataKelas',compact('id','data','dataKelas'));
    }

    public function updateDetailTindakanMedis(Request $request){
        // print_r($request->toArray());
        $request->offsetUnset('_token');
        $data = DetailSubMedisKelas::where('id_detail_sub_medis_kelas','=',$request->id_detail_sub_medis_kelas);
        $data->update($request->toArray());
        return back();
    }

    public function deleteDetailTindakanMedis($poli,$id){
        $data = DetailSubMedisKelas::where('id_detail_sub_medis_kelas','=',$id);
        $data->delete();
        return back();
    }

    public function detailHarga($poli,$id,$id2){
        $data = DetailMedisKelas::where('id_detail_medis_kelas','=',$id2)->get();
        $dataDokter = Dokter::all();
        $dataPetugas = PetugasMedis::all();
        $dataJasa = SubJasa::all();
        return view('new.igd.detailTindakanMedis1',compact('data','dataDokter','dataPetugas','id','dataJasa'));
    }

    public function tambahDetailTindakanMedis($poli,Request $request,$id){
        $data = new DetailSubMedisKelas;
        $data->id_detail_medis_kelas = $id;
        $data->id_sub_jasa = $request->id_sub_jasa;
        $data->harga = $request->harga;
        $data->save();
        return back();
    }

    public function detailTindakan($id){
        $data[] = TindakanMedisDokter::where('id_tm_d_p',"=",$id)->get();
        $data[] = TindakanMedisPetugas::where('id_tm_d_p',"=",$id)->get();
        return json_encode($data);
    }

    public function detailPetugas(Request $request){
        return json_encode($request->all());
    }

    public function update(Request $request)
    {
        $request->offsetUnset('_token');
        $data = TindakanMedis::where('id_tindakan_medis','=',$request->id_tm_d_p);
        $data->update($request->all());
        // return redirect('IGD/jenisTindakanMedis');
    }

    public function showList(Request $request,$id2)
    {
        $search = '';
        $id_kelas = DetailPendaftaran::select('id_kelas')->where('id_detail_pendaftaran','=',$id2)->get()[0];
        if(isset($request['search'])) {
            $search = $request->search;
            // $tindakan = DetailMedisKelas::where('id_kelas','=', $id_kelas->id_kelas)->get();
            $data = DetailMedisKelas::join('tm_d_p','tm_d_p.id_tm_d_p','=','detail_medis_kelas.id_tm_d_p')->where("nama",'LIKE','%'.$request->search.'%')->where('id_kelas','=',$id_kelas->id_kelas)->paginate(10);
            $next_page_url = $data->appends(['search' => $search])->nextPageUrl();
            $previous_page_url = $data->appends(['search' => $search])->previousPageUrl();
        }else{
            $data = DetailMedisKelas::where('id_kelas','=',$id_kelas->id_kelas)->paginate(10);
            $next_page_url = $data->nextPageUrl();
            $previous_page_url = $data->previousPageUrl();
        }
        $last_page = $data->lastPage();
        $current_page = $data->currentPage();
        $out = array();
        $i = 0;
        foreach ($data as $key => $row) {
            $out[$i++] = "<tr><td>".$row->id_detail_medis_kelas."</td><td>".$row->tindakanMedis->nama."</td><td>".$row->harga_total."</td><td><button type='button' class='btn btn-default' id='bt".$row->id_detail_medis_kelas."' onclick='tindak(".$row->id_detail_medis_kelas.");'><span class='fa fa-check'></span></button></td></tr>";
        }
        return json_encode(compact('next_page_url','previous_page_url','last_page','current_page','search','out'));
    }

    public function destroy($poli,$id)
    {
        $data = TindakanMedis::where('id_tindakan_medis','=',$id);
        $data->delete();
        return redirect('IGD/jenisTindakanMedis');
    }
}
