<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Dokter;

use App\PetugasMedis;

use App\JobDokter;

use App\JobPetugas;

use App\NTindakanMedisDokter;

use App\NTindakanMedisPetugas;


class PersonaliaController extends Controller
{

    public function index()
    {
        $dokter = Dokter::all();
        $petugas = PetugasMedis::All();
        $job = JobDokter::All();
        return view('new.personalia.dashboard',compact('dokter','petugas','job'));
    }

    public function index1()
    {
        $dokter = Dokter::where('status','=',1)->get();
        $job = JobDokter::All();
        // JobDokter::select(DB::raw("sum(apa) as jumlahApa"),'kolom_selanjutnya')->get();
        return view('new.personalia.dataDokter',compact('dokter','job'));
    }

    public function index2()
    {
        $petugas = PetugasMedis::where('status','=',1)->get();
        $job = JobPetugas::All();
        return view('new.personalia.dataPetugasMedis',compact('petugas','job'));
    }

    public function index3(Request $request){
        $dokter = Dokter::where("id_dokter","=",$request->id)->get();   
        if (!isset($dokter[0])) {
            return back();
        }
        $data = NTindakanMedisDokter::where("id_dokter","=",$request->id)->where("tanggal",">=",$request->awal)->where("tanggal",">=",$request->akhir)->get();
        return view("new.personalia.aktivitas",compact('dokter','data'));
    }

    public function index4(){

    }

    public function tambahDokter(Request $request)
    {
        $request->offsetUnset('_token');
        $request->request->add(['tgl_awal_sip' => substr($request->tanggal, 0,10)]);
        $request->request->add(['tgl_akhir_sip' => substr($request->tanggal, 12,21)]);
        $request->offsetUnset('tanggal');
        $data = new Dokter;
        $data->insert($request->toArray());
        return redirect('PERSONALIA/Data/Dokter');
    }

    public function tambahPetugas(Request $request)
    {
        $request->offsetUnset('_token');
        $request->request->add(['tgl_awal_sip' => substr($request->tanggal, 0,10)]);
        $request->request->add(['tgl_akhir_sip' => substr($request->tanggal, 12,21)]);
        $request->offsetUnset('tanggal');
        $data = new PetugasMedis;
        $data->insert($request->toArray());
        return redirect('PERSONALIA/Data/Petugas');
    }

    public function show1($poli,$id)
    {
        $data = Dokter::where('id_dokter','=',$id);
        return json_encode($data);
    }
    public function show2($poli,$id){
        $data = PetugasMedis::where('id_petugas_medis','=',$id);
        return json_encode($data);
    }

    public function ubahDokter(Request $request)
    {
        $request->offsetUnset('_token');
        $request->request->add(['tgl_awal_sip' => substr($request->tanggal, 0,10)]);
        $request->request->add(['tgl_akhir_sip' => substr($request->tanggal, 12,21)]);
        $request->offsetUnset('tanggal');
        print_r($request->toArray());

        $data = Dokter::where('id_dokter','=',$request->id_dokter);
        $data->update($request->toArray());
        return redirect('PERSONALIA/Data/Dokter');
    }
    public function ubahPetugas(Request $request)
    {
        $request->offsetUnset('_token');
        $request->request->add(['tgl_awal_sip' => substr($request->tanggal, 0,10)]);
        $request->request->add(['tgl_akhir_sip' => substr($request->tanggal, 12,21)]);
        $request->offsetUnset('tanggal');
        $data = PetugasMedis::where('id_petugas_medis','=',$request->id_petugas_medis);

        $data->update($request->toArray());
        return redirect('PERSONALIA/Data/Petugas');
    }

    public function hapusDokter($poli,$id)
    {
        $data = Dokter::where('id_dokter','=',$id);
        $data->update(['status' => 0]);
        return redirect('PERSONALIA/Data/Dokter');
    }
    
    public function hapusPetugas($poli,$id)
    {
        $data = PetugasMedis::where('id_petugas_medis','=',$id);
        $data->update(['status' => 0]);
        return redirect('PERSONALIA/Data/Petugas');
    }
}
