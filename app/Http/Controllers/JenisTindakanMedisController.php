<?php

namespace App\Http\Controllers;

use App\DetailDokterPoli;
use App\Http\Requests;
use App\NTindakanMedisDokter;
use App\NTindakanMedisPetugas;
use App\TindakanMedis;
use App\TindakanMedisDokter;
use App\TindakanMedisPetugas;
use App\ViewTindakanMedis;
use App\DetailTindakanMedis;
use App\Dokter;
use App\PetugasMedis;
use App\Kelas;
use App\DetailMedisKelas;
use App\SubJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class JenisTindakanMedisController extends Controller
{

    public function index()
    {
        $data = TindakanMedis::All();
        return view('new.igd.jenisTindakanMedis',compact('data'));
    }

    public function store(Request $request)
    {
        $request->offsetUnset('_token');
        $data = new TindakanMedis;
        $id_tm_d_p = $data->insertGetId($request->all());
        $kelas = Kelas::all();
        $dataArray = [];
        foreach ($kelas as $key => $value) {
            $dataArray[] = ['id_tm_d_p' => $id_tm_d_p,'id_kelas' => $value->id_kelas];
        }
        $data1 = DetailMedisKelas::insert($dataArray);
        return redirect(Auth::user()->poli->prefix.'/Data/Kelas/'.$id_tm_d_p);
    }

    public function show($poli,$id)
    {
        $data = TindakanMedis::where('id_jenis_tindakan_medis','=',$id);
        return json_encode($data);
    }

    public function edit($poli,$id)
    {
        $data = TindakanMedis::where('id_jenis_tindakan_medis','=',$id);
        return json_encode($data);
    }

    public function update(Request $request)
    {
        // print_r($request->all());
        $request->offsetUnset('_token');
        $data = TindakanMedis::where('id_tm_d_p','=',$request->id_tm_d_p);
        $data->update($request->all());
        return back();
    }

    public function destroy($poli,$id)
    {
        $data = TindakanMedis::where('id_tm_d_p','=',$id);
        $data->delete();
        return back();
    }

    public function detailTindakanMedis($poli,$id){
        $data = TindakanMedis::where('id_tm_d_p','=',$id)->get();
        $dataDokter = Dokter::all();
        $dataPetugas = PetugasMedis::all();
        $dataJasa = SubJasa::all();
        return view('new.igd.detailTindakanMedis',compact('data','dataDokter','dataPetugas','dataJasa'));
    }

    public function tambahKelasMedis($poli,Request $request,$id){
        $data = new DetailMedisKelas;
        $data->id_tm_d_p = $id;
        $data->id_kelas = $request->id_kelas;
        $data->save();
        return back();
    }

    public function updatePRS(Request $request,$poli,$id){
        $data = DetailMedisKelas::where('id_detail_medis_kelas','=',$id);
        $data->update(['rumah_sakit' => $request->persentase]);
        return back();
    }

    public function insertDP(Request $request,$poli,$id){
        if ($request->jenisPetugas == 0) {
            $data = new TindakanMedisDokter;
            $data->id_dokter = $request->id_dokter;
            if ($request->jenisAcuan == 0) {
                $data->persentase = 100;
                $data->harga = $request->harga;
            }else{
                $data->persentase = $request->persentase;
            }
            $data->id_detail_medis_kelas = $id;
            $data->save();
            echo "success dokter".$data->id_tm_d_p;
        }else{
            $data = new TindakanMedisPetugas;
            $data->id_petugas = $request->id_petugas;
            $data->persentase = $request->persentase;
            $data->id_detail_medis_kelas = $id;
            $data->save();
        }
        return back();
    }

    public function updateDokter(Request $request,$poli,$id){
        $data = TindakanMedisDokter::where('id_tm_d','=',$id);
        $data->update(['persentase' => $request->persentase]);
        return back();
    }

    public function updatePetugas(Request $request,$poli,$id){
        $data = TindakanMedisPetugas::where('id_tm_p','=',$id);
        $data->update(['persentase' => $request->persentase]);
        return back();
    }

    public function deleteDokter($poli,$id){
        $data = TindakanMedisDokter::where('id_tm_d','=',$id);
        $data->delete();
        return back();
    }
    public function deletePetugas($poli,$id){
        $data = TindakanMedisPetugas::where('id_tm_p','=',$id);
        $data->delete();
        return back();
    }

    public function tambahTindakanPasien(Request $request){
        // print_r($request->toArray());
        for ($i=0; $i < $request->jumlah; $i++) { 
            $data = new DetailTindakanMedis;
            $data->id_detail_medis_kelas = $request->id_detail_medis_kelas;
            $data->id_detail_pendaftaran = $request->id_detail_pendaftaran;
            $data->tanggal = $request->tanggal;
            $id = DetailTindakanMedis::insertGetId($data->toArray());
        }
        return back();
        // $url = Auth::user()->poli->prefix."/Pasien/DetailTindakanMedis/Edit/".$id;
        // return redirect($url);
    }

    public function hapusTindakanPasien($poli,$id){
        $data = DetailTindakanMedis::where('id_detail_tindakan_medis','=',$id)->delete();
        return back();
    }

    public function editTindakanPasien($poli,$id){
        $data = DetailTindakanMedis::where('id_detail_tindakan_medis','=',$id)->get();
        return view('new.igd.editDetailTindakanMedis',compact('data','dataDokter','dataPetugas'));
    }

    public function editRsTindakanMedis(Request $request,$poli,$id){
        $harga_p = DetailTindakanMedis::where('id_detail_tindakan_medis','=',$id)->get()[0]->harga_p;
        $data = DetailTindakanMedis::where('id_detail_tindakan_medis','=',$id);
        $data->update(['harga_rs' => $request->harga,'harga_total' => $request->harga+$harga_p]);
        return back();
    }

    public function editDokterTindakanMedis(Request $request,$poli,$id){
        $data = NTindakanMedisDokter::where('id_tm_d','=',$id);
        $data->update(['harga' => $request->harga, 'id_dokter' => $request->id_dokter]);
        return back();
    }

    public function editPetugasTindakanMedis(Request $request,$poli,$id){
        $data = NTindakanMedisPetugas::where('id_tm_p','=',$id);
        $data->update(['harga' => $request->harga, 'id_petugas' => $request->id_petugas]);
        return back();
    }
}

