<?php

namespace App\Http\Controllers;

use App\DetailDokterPoli;
use App\DetailPetugasPoli;
use App\Dokter;
use App\Resep;
use App\Http\Requests;
use App\PetugasMedis;
use App\Poli;
use App\User;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Poli::where("status","=",1)->get();
        $d = new Poli;
        $kat_poli = $d->getEnum("kat_poli");
        return view('new.utilitas.dataPoli',compact('data','kat_poli'));
    }

    public function dokter($id){
        $data = DetailDokterPoli::where("id_poli","=",$id)->where("status","=","Active")->get();
        $dokter = Dokter::all();
        return view('new.utilitas.dataDokter',compact('data','dokter','id'));
    }

    public function farmasi(){
        $data = Resep::where("total","=",0)->get();
        return view('sfynf/farmasi/permintaanResep',compact('data'));
    }

    public function tambahDokter(Request $request){
        $data = new DetailDokterPoli;
        $data->id_poli = $request->id_poli;
        $data->id_dokter = $request->id_dokter;
        $data->save();
        return back();
    }

    public function deleteDokter($id){
        $data = DetailDokterPoli::where('id_dokter_poli',"=",$id);
        $data->update(['status' => 'Inactive']);
        return back();
    }

    public function petugas($id){
        $data = DetailPetugasPoli::where("id_poli","=",$id)->where("status","=","Active")->get();
        $petugas = PetugasMedis::all();
        return view('new.utilitas.dataPetugas',compact('data','petugas','id'));
    }

    public function tambahPetugas(Request $request){
        $data = new DetailPetugasPoli;
        $data->id_poli = $request->id_poli;
        $data->id_petugas_medis = $request->id_petugas_medis;
        $data->save();
        return back();
    }

    public function deletePetugas($id){
        $data = DetailPetugasPoli::where("id_petugas_poli","=",$id);
        $data->update(['status' => 'Inactive']);
        return back();
    }

    public function store(Request $request)
    {
        $request->offsetUnset('_token');
        $request->offsetUnset('id_poli');
        Poli::create($request->all());
        return back();
    }

    public function update(Request $request)
    {
        $request->offsetUnset('_token');
        $data = Poli::where('id_poli','=',$request->id_poli);
        $data->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        $data = Poli::where('id_poli','=',$id);
        $data->update(['status' => 0]);
        return back();
    }

    public function detail($id){
        $poli = Poli::all();
        $data = User::where('id_poli','=',$id)->get();
        return view('new.personalia.dataUser',compact('data','poli','id'));
    }
}
