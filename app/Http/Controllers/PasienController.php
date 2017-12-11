<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pendaftaran;

use App\Pasien;
use App\Poli;
use Datatables;

class PasienController extends Controller
{

    public function index()
    {
        $data = Pasien::all();
        return view('igd/dataPasien',['data' => $data]);
    }
    public function riwayat($poli,$id){
        $data = Pasien::where("no_rm","=",$id)->get();
        // dd($data[0]->pendaftaran);
        return view('new.igd.riwayat',compact('data'));
    }
    public function detailRiwayat($poli,$id){
        $data = Pendaftaran::where("id_pendaftaran","=",$id)->get();
        return view('new.igd.detailRiwayat',compact('data'));
    }

    public function pasienLama($poli,$id){
       $data = Pasien::where('pasien.no_rm','=',$id)
       ->leftJoin('pendaftaran','pasien.no_rm','=','pendaftaran.no_rm')
       ->get();
       $poli = Poli::All();
       $status = true;
       return view('new.pendaf.pendaftaran',compact('data','poli'));
   }

   public function pendafPasien(Request $request){
    $data = array();
    if (isset($request['nama'])) {
        $status = 1;
        if ($request->nama != '') {
            $data = Pasien::where('nama','like','%'.$request->nama.'%')->paginate(15);
        }else{
            if ($request->alamat != '') {
             $data = Pasien::where('nama','like','%'.$request->nama.'%')->where('alamat','like','%'.$request->alamat.'%')->paginate(15);
         }   
     }
 }else{
    $status = 0;
    $data = Pasien::orderBy('no_rm','desc')->paginate(15);
}
return view('new/pendaf/dataPasien', compact('data', 'status'));
}

public function show($poli,$id)
{
    $data = Pasien::where('no_rm','=',$id)->get();
    return json_encode($data);
}

public function show1($id){
    $data = Pasien::where('pasien.no_rm','=',$id)
    ->leftJoin('pendaftaran','pasien.no_rm','=','pendaftaran.no_rm')
    ->get();
    return json_encode($data);
}

public function update(Request $request)
{
    $request->offsetUnset('_token');
    $update = Pasien::where('no_rm','=',$request->no_rm);
    $update->update($request->toArray());
    return redirect('PENDAF/pasien');
}

public function destroy($poli,$id){
    $data = Pasien::where('no_rm','=',$id);
    $data->delete();
}

public function test(){
    $dataku = new Pasien;
    $data1 = $dataku->getColumnsName();
    foreach ($data1 as $key => $value) {
        $data2[$value->Field] = '';
    }
    print_r($data2);
}

public function test1(){
    $data1 = new Pasien;
    $data = $data1->getEnum('agama');
    print_r($data);
}

public function test2(Request $request){
    $data = new Pasien;
    $insert = $data->getInsertData($request);
    print_r($insert);
    $data->insert($insert);
    echo $data;
}

    // public function dataPasien($poli)
    // {
    //     $pasien = Pasien::select('no_rm', 'nama', 'jenis_kelamin', 'jenis_kepesertaan', 'nama_orang_tua', 'nama_suami_istri', 'tanggal_lahir', 'alamat')->get();
    //     // return view('new/pendaf/newDataPasien', compact('pasien'));
    //     return Datatables::of($pasien)->addColumn('aksi', function($pasien){
    //         return "<a href='pendaftaran/pasienlama/".$pasien->no_rm."'><button type='button' class='btn btn-primary'><i class='fa fa-check'></i></button></a>";
    //     })->make(true);
    // }
}
