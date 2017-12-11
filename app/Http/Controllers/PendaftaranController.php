<?php

namespace App\Http\Controllers;

use App\DetailPendaftaran;
use App\Dokter;
use App\Http\Requests;
use App\JenisDiagnosa;
use App\Kelas;
use App\Pasien;
use App\Pendaftaran;
use App\Poli;
use App\TindakanMedis;
use App\ViewDetailPendaftaran;
use App\ViewPendaftaran;
use App\Setting;
use App\Resep;
use App\DetailKamarInap;
use App\DetailMedisKelas;
use App\Kamar;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Alert;

class PendaftaranController extends Controller
{

    public function index()
    {
        $data = DetailPendaftaran::where('id_poli','=',Auth::user()->id_poli)->where('status','=','Masuk')->orderBy('id_detail_pendaftaran', 'desc')->get();
        // print_r($data);
        $pen = new Pendaftaran;
        $kategori_usia = $pen->getEnum('kategori_usia');
        $poli = Poli::all();
        $dataDokter = Dokter::all();
        $masuk = DetailPendaftaran::where('id_poli', '=', Auth::user()->id_poli)->where('status', '=', 'Masuk')->where('tgl_masuk','like','%'.date('Y-m-d').'%')->count();
        if (Auth::user()->poli->prefix == "PENDAF") {
            $dirawat = DetailPendaftaran::where('id_poli','=',4)->where('status','=','Dirawat')->count();
        }else{
            $dirawat = DetailPendaftaran::where('id_poli', '=', Auth::user()->id_poli)->where('status', '=', 'Dirawat')->count();
        }
        $keluar = DetailPendaftaran::where('id_poli', '=', Auth::user()->id_poli)->where('status', '=', 'Keluar')->count();
        $dirujuk = DetailPendaftaran::where('id_poli', '=', Auth::user()->id_poli)->where('status', '=', 'Dirujuk')->count();
        // foreach ($data as $key => $value) {
        //     echo $value->id_pendaftaran."|";
        //     echo $value->pendaftaran->no_rm."|||<br>";
        // }
        return view('new/igd/dashboard',compact('data','kategori_usia','poli','dataDokter', 'masuk', 'dirawat', 'keluar', 'dirujuk'));
    }

    public function dataPendaftaran(){
        $data = Pendaftaran::all();
        return view('new.pendaf.dataPasien','data');
    }

    public function igdDashboard()
    {
        // print_r(Auth::user());
        $data = DetailPendaftaran::where('id_poli','=',Auth::user()->poli->id_poli)->where('status','=','Masuk')->get();
        $pen = new Pendaftaran;
        $kategori_usia = $pen->getEnum('kategori_usia');
        $poli = Poli::all();
        $dataDokter = Dokter::all();
        return view('new.igd.dashboard',compact('data','kategori_usia','poli','dataDokter'));
    }

    public function igdDirawat()
    {
        $data = DetailPendaftaran::where('id_poli','=',Auth::user()->poli->id_poli)->where('status','=','Dirawat')->orderBy('id_pendaftaran','desc')->get();
        $pen = new Pendaftaran;
        $kategori_usia = $pen->getEnum('kategori_usia');
        $poli = Poli::all();
        $dataDokter = Dokter::all();
        return view('new.igd.dataPasien',compact('data','kategori_usia','poli','dataDokter'));
    }


    public function igdKeluar()
    {
        $data = DetailPendaftaran::where('id_poli','=',Auth::user()->poli->id_poli)->where('status','=','Keluar')->get();
        $pen =new Pendaftaran;
        $kategori_usia = $pen->getEnum('kategori_usia');
        $poli = Poli::all();
        return view('new.igd.pasienKeluar',compact('data','kategori_usia','poli'));
    }

    public function dataKeluar(){
        $data1 = Pendaftaran::where('total','>',0)->where('cara_keluar','=','Benar-Benar Pulang')->get();
        $data2 = Pendaftaran::where('total','>',0)->where('cara_keluar','=','Pulang Paksa')->get();
        $data3 = Pendaftaran::where('total','>',0)->where('cara_keluar','=','Dirujuk')->get();
        return view('new.igd.dataKeluar',compact('data1','data2','data3'));
    }

    public function dataDirawat($poli){
        $data1 = DetailPendaftaran::where('id_poli','=',Auth::user()->poli->id_poli)->where('status','=','Dirawat')->orderBy('id_pendaftaran','desc')->get();
        $data2 = DetailPendaftaran::where('status','=','Dirawat')->where('id_poli','!=',6)->get();
        return view('new.igd.dataDirawat',compact('data1','data2'));
    }

    public function updateStatus($poli,Request $request)
    {
        // print_r($request->all());
        $data = DetailPendaftaran::where('id_detail_pendaftaran','=',$request->id_detail_pendaftaran);
        $data->update(['status' => 'Dirawat','id_dokter' => $request->id_dokter]);
        return back();
    }

    public function updateKeluar($poli,Request $request){
        // $data = DetailPendaftaran::where('id_detail_pendaftaran','=',$request->id_detail_pendaftaran)->get();
        $data1 = Pendaftaran::where('id_pendaftaran','=',$request->id_detail_pendaftaran);
        $data2 = DetailPendaftaran::where('id_pendaftaran','=',$request->id_detail_pendaftaran);
        $dat = DetailPendaftaran::where('id_pendaftaran','=',$request->id_detail_pendaftaran)->where('id_poli','=','4')->get();
        date_default_timezone_set("Asia/Jakarta");
        if (isset($dat[0])) {
            $data3 = DetailKamarInap::where('id_detail_pendaftaran','=',$dat[0]->id_detail_pendaftaran);
            $data3->update(['detail_status' => 'keluar','tanggal_keluar' => date('Y-m-d H:i:s')]);
        }
        $request->offsetUnset('_token');
        $id = $request->id_detail_pendaftaran;
        $request->offsetUnset('id_detail_pendaftaran');
        $data1->update($request->all());
        // echo date('Y-m-d H:i:s');
        $data2->update(['status' => 'Keluar','tgl_keluar'=>date('Y-m-d H:i:s')]);
        // return redirect($poli.'/Billing/verifikasi');
        return redirect($poli.'/cetakBilling1/'.$id);
    }

    public function create()
    {
        $poli = Poli::All();
        $status = true;
        return view('new/pendaf/pendaftaran',compact('poli','status'));
    }

    public function create1(){
        $status = false;
        $id = Auth::user()->id_poli;
        return view('new/pendaf/pendaftaran',compact('status','id'));
    }

    public function store(Request $request)
    {
        $jPasien = $request->jenis_pasien;
        $no = Pasien::max('no_rm')+1;
        
        if ($jPasien=="BARU") {
            $data = new Pasien;
            $data->nama = $request->nama;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->alamat = $request->alamat;
            $data->kabupaten = $request->kabupaten;
            $data->kecamatan = $request->kecamatan;
            $data->desa = $request->desa;
            $data->dusun = $request->dusun;
            $data->nama_suami_istri = $request->nama_suami_istri;
            $id = Pasien::insertGetId($data->toArray());
            echo $id;
            $dat = new Pendaftaran;
            $dat->no_rm = $id;
            $dat->pasien_baru_lama = $request->jenis_pasien;
            $dat->jenis_kepesertaan = $request->jenis_kepesertaan;
            if ($request->jenis_kepesertaan == "UMUM") {
                $dat->no_kepesertaan = "";
                $dat->no_sep ="";
            } else {
                $dat->no_kepesertaan = $request->no_kepesertaan;
                $dat->no_sep = $request->no_sep;
            }
            $dat->nama_pj = $request->nama_pj;
            $dat->no_hp_pj = $request->no_hp_pj;
            $dat->tanggal_daftar = $request->tanggal_daftar;
            $dat->umur = $request->umur;
            $dat->kategori_usia = $request->kategori_usia;
            $dat->cara_masuk = $request->cara_masuk;
            $dat->rujukan = $request->rujukan;
            $dat->nama_perujuk = $request->nama_perujuk;
            $dat->jalur_masuk = $request->jalur_masuk;
            $dat->id_poli = $request->id_poli;
            $id2 = Pendaftaran::insertGetId($dat->toArray());
            $da = new DetailPendaftaran;
            $da->id_poli = 6;
            $da->id_pendaftaran = $id2;
            $da->status = "Masuk";
            $da->id_dokter = 0;
            $da->id_kelas = 1;
            $da->save();
            echo "sukses";
            // });
        }else{
            // DB::beginTransaction(function(){
            $dt = new Pasien;
            $dt->nama = $request->nama;
            $dt->jenis_kelamin = $request->jenis_kelamin;
            $dt->tanggal_lahir = $request->tanggal_lahir;
            $dt->alamat = $request->alamat;
            $dt->kabupaten = $request->kabupaten;
            $dt->desa = $request->desa;
            $dt->kecamatan = $request->kecamatan;
            $dt->dusun = $request->dusun;
            $dt->nama_suami_istri = $request->nama_suami_istri;
            // print_r($dt->toArray());
            $dta = Pasien::where('no_rm','=',$request->noRM);
            $dta->update($dt->toArray());
            $dat = new Pendaftaran;
            $dat->pasien_baru_lama = 'Lama';
            $dat->no_rm = $request->noRM;
            $dat->jenis_kepesertaan = $request->jenis_kepesertaan;
            if ($request->jenis_kepesertaan == "UMUM") {
                $dat->no_kepesertaan = "";
                $dat->no_sep ="";
            } else {
                $dat->no_kepesertaan = $request->no_kepesertaan;
                $dat->no_sep = $request->no_sep;
            }
            $dat->nama_pj = $request->nama_pj;
            $dat->no_hp_pj = $request->no_hp_pj;
            $dat->tanggal_daftar = $request->tanggal_daftar;
            $dat->umur = $request->umur;
            $dat->kategori_usia = $request->kategori_usia;
            $dat->cara_masuk = $request->cara_masuk;
            $dat->rujukan = $request->rujukan;
            $dat->nama_perujuk = $request->nama_perujuk;
            $dat->jalur_masuk = $request->jalur_masuk;
            $dat->id_poli = $request->id_poli;
            // print_r($dat->toArray());
            $id2 = Pendaftaran::insertGetId($dat->toArray());
            $da = new DetailPendaftaran;
            $da->id_poli = 6;
            $da->id_pendaftaran = $id2;
            $da->status = "Masuk";
            $da->id_dokter = 0;
            $da->id_kelas = 1;
            $da->save();
            // });
            if ($id2 > 0) {
                Alert::success('Pendaftaran Berhasil Dilakukan!')->persistent("Close");
            }else{
                Alert::error('Pendaftaran Berhasil Dilakukan!')->persistent("Close");
            }
        }
        // Alert::success('Pendaftaran Berhasil Dilakukan!')->persistent("Close");
        return redirect(Auth::user()->poli->prefix.'/dashboard')->with('success', 'Pendaftaran Berhasil Dilakukan!');;
    }

    public function show($id)
    {
        $data = Pendaftaran::join('pasien','pasien.no_rm','=','pendaftaran.no_rm')->where('id_pendaftaran','=',$id)->get();
        return json_encode($data);
    }

    public function show1($id){
        $data = Pendaftaran::join('pasien','pasien.no_rm','=','pendaftaran.no_rm')->where('id_pendaftaran','=',$id)->get();
        return json_encode($data);
    }

    public function pendaftaranSekarang($id){
        $data = DetailPendaftaran::where('id_poli','=',$id)->where("status",'=','Masuk')->count();
        return $data;
    }

    public function cekPendaf($id,$jml){
        $data = DetailPendaftaran::where("id_poli","=",$id)->where("status","=","Masuk")->count();
        if ($data > $jml) {
            return 1;
        }else{
            return 0;
        }
    }

    public function diagnosa1($poli,$id,$id2){
     $d = DetailPendaftaran::where('id_pendaftaran','=',$id)->get();
       // print_r($d);
       // echo $id;
     $data = Pendaftaran::where('id_pendaftaran','=',$id)->get();
       // print_r($data);
     $rujukan = DetailPendaftaran::join('poli','poli.id_poli','=','detail_pendaftaran.id_poli')->where('kat_poli','=','poli')->where('id_pendaftaran','=',$id)->get();
       // $id_kelas = DetailPendaftaran::select('id_kelas')->where('id_detail_pendaftaran','=',$id2)->get()[0];
       // $tindakan = DetailMedisKelas::where('id_kelas','=', $id_kelas->id_kelas)->get();
       // echo $id_kelas->id_kelas;
       // print_r($tindakan);
     $dataDokter = Dokter::all();
     $data2 = DetailPendaftaran::where(function($query){
        $query->where('id_poli','=','7')->orWhere('id_poli','=','8');
    })->where('id_pendaftaran','=',$id)->get();
     $data1 = DetailPendaftaran::where('id_pendaftaran','=',$id)->where('id_poli','=',Auth::user()->id_poli)->get();
       // $diagnosa = JenisDiagnosa::paginate(500);
     $poli = Poli::where('kat_poli','=','poli')->get();
     $id_detail = DetailPendaftaran::where('status','=','Dirawat')->where('id_pendaftaran','=',$id)->where('id_poli','=',Auth::user()->poli->id_poli)->get()[0]->id_detail_pendaftaran;
     return view('new.igd.diagnosaPasien',compact('data','data1','rujukan','data2','tindakan','id_detail','diagnosa','poli','dataDokter','id2'));
 }

 public function tambahObat($poli,$id,Request $request){
    $request->offsetUnset("_token");
    $request['id_pendaftaran'] = $id;
        // echo str_replace(PHP_EOL,'\n',$request->rsp);
    $request['resep'] = str_replace(PHP_EOL,'\n',$request->rsp);
    $request->offsetUnset("rsp");
        // dd($request->toArray());
        // print_r($request->toArray());
    $data = Resep::insert($request->toArray());
    return back();
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pendaftaran::where('id_pendaftaran','=',$id)->get();
        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->offsetUnset('_token');
        $request->offsetUnset('kunjungan_ke');

        $data = Pendaftaran::where('id_pendaftaran','=',$request->id_pendaftaran);
        $data->update($request->all());

        return redirect('PENDAF/dashboard');
    }

    public function destroy($id)
    {
        $data = Pendaftaran::where('id_pendaftaran','=',$id);
        $data->delete();
    }

    public function rujuk(Request $request,$poli,$id){
        $data = DetailPendaftaran::where('id_detail_pendaftaran','=',$id)->get()[0];
        $id_pendaftaran =  $data->id_pendaftaran;

        $data = new DetailPendaftaran;
        $data->memo = $request->memo;
        $data->id_pendaftaran = $id_pendaftaran;
        $data->id_poli = $request->id_poli;
        $data->status = 'Masuk';
        $data->memo = $request->memo;
        $data->save();
        return back();
    }
    //ranap
    public function index1()
    {
        $data = Pendaftaran::all();
        $pen = new Pendaftaran;
        $kategori_usia = $pen->getEnum('kategori_usia');
        $poli = Poli::all();
        return view('rawatInap.pendaftaran',compact('data','kategori_usia','poli'));
    }

    public function rinapDashboard(){
        $data = Pendaftaran::JOIN('detail_pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'detail_pendaftaran.id_pendaftaran')
        ->where('detail_pendaftaran.id_poli','=','4')
        ->where('status', '=', 'Masuk')
        ->get();
        $pen = new Pendaftaran;
        $kategori_usia = $pen->getEnum('kategori_usia');
        $poli = Poli::all();
        $dataKelas = Kelas::where('status','=',1)->get();
        $totalkamar = Kamar::select(DB::raw("count(id_kamar) as totalkamar"))->get();
        $dataDokter = Dokter::where('status', '=', '1')->get();$pasienmasuk = DetailPendaftaran::select(DB::raw("count(detail_pendaftaran.id_pendaftaran) as pasienmasuk"))
        ->where('detail_pendaftaran.id_poli','=','4')
        ->where('status', '=', 'Masuk')
        ->get();
        $pasiendirawat = DetailPendaftaran::select(DB::raw("count(detail_pendaftaran.id_pendaftaran) as pasiendirawat"))
        ->where('detail_pendaftaran.id_poli','=','4')
        ->where('status', '=', 'Dirawat')
        ->get();
        $totalpasien = DetailPendaftaran::select(DB::raw("count(detail_pendaftaran.id_pendaftaran) as totalpasien"))
        ->where('detail_pendaftaran.id_poli','=','4')
        ->get();
        return view('rawatInap.dashboard',compact('data','kategori_usia','poli', 'id_kelas', 'dataKelas', 'dataDokter','totalkamar','pasienmasuk','pasiendirawat','totalpasien'));
    }

    public function pasienDirawat(){
        $data = Pendaftaran::JOIN('detail_pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'detail_pendaftaran.id_pendaftaran')
        ->where('detail_pendaftaran.id_poli','=','1')
        ->where('status', '=', 'dirawat')
        ->get();
        $pen = new Pendaftaran;
        $kategori_usia = $pen->getEnum('kategori_usia');
        $poli = Poli::all();
        return view('rawatInap.dataPasien',compact('data','kategori_usia','poli'));
    }
    
    public function cetakBilling($poli,$id){
        $data = Pendaftaran::where("id_pendaftaran","=",$id)->get()[0];
        $harga_pendaftaran = Setting::where("id_setting","=","2")->get()[0]->value;
        $yes = 1;
        return view('rawatInap/cetakBilling',compact('data','harga_pendaftaran','id','yes'));
    }

    public function cetakBilling1($poli,$id){
        // echo $id;
        $data = Pendaftaran::where("id_pendaftaran","=",$id)->get()[0];
        $harga_pendaftaran = Setting::where("id_setting","=","2")->get()[0]->value;
        $yes = 0;
        return view('rawatInap/cetakBilling',compact('data','harga_pendaftaran','id','yes'));
    }

    public function cetakBilling2($poli,$id){
        $data = null;
        // echo $id;
        $d = Pendaftaran::where('id_pendaftaran','=',$id)->get();
        $harga_pendaftaran = Setting::where("id_setting","=","2")->get()[0]->value;
        
        if (isset($d[0])) {
            $i = 0;
            $lanjutan = 0;
            $khusus = 0;
            $simpan = array();
            foreach ($d[0]->detail as $key => $val) {
                // echo $i;
                $lanjut = false;
                $j = 0;
                $sim = 0;
                // for ($q=0; $q < count($simpan) ; $q++) { 
                //     if ($val->poli->nama_poli === $simpan[$q]['unit']) {
                //         $lanjut = true;
                //         $khusus = $simpan[$q]['jml'];
                //         $lanjutan +=1;
                //         $sim = $q;
                //     }
                // }
                // if ($lanjut) {
                //     $j = $khusus;
                //     $i = $sim;
                // }else{
                //     $i = $i+$lanjutan;
                // }
                // echo $i.':'.$j.'_';
                // echo $lanjutan;
                if ($val->id_poli == 6) {
                    if ($val->pendaftaran->pasien_baru_lama == 'BARU') {
                        $dat['unit'] = $val->poli->nama_poli;
                        $dat['tindakan_medis'][$j][0] = 0;
                        $dat['tindakan_medis'][$j][1] = 'Pendaftaran'; 
                        $dat['tindakan_medis'][$j][2] = 1;
                        $dat['tindakan_medis'][$j][3] = $harga_pendaftaran;
                        array_push($data,$dat);
                        $j++;
                    }
                }else{
                    $data[$i]['unit'] = $val->poli->nama_poli;
                    $data[$i]['tindakan_medis'] = null;
                    $array = null;
                    $k = 0;
                    if ($val->id_poli == 4) {
                        foreach ($val->det_kamar as $key => $r1) {
                            $array[$i]['my'][$j][0] = $j;
                            $array[$i]['my'][$j][1] = $r1->kamar->harga*$r1->view->total;
                            $array[$i]['my'][$j][2] = $r1->kamar->nama;
                            $data[$i]['tindakan_medis'][$j][0] = $r1->id_kamar_inap;
                            $data[$i]['tindakan_medis'][$j][1] = $r1->kamar->nama;
                            $data[$i]['tindakan_medis'][$j][2] = $r1->view->total;
                            $data[$i]['tindakan_medis'][$j][3] = $r1->kamar->harga*$r1->view->total;
                            $j++;
                        }
                    }
                    if($val->id_poli == 7 || $val->id_poli == 8){
                        foreach($val->pemeriksaan as $rpem){
                            foreach($rpem->DetailPemeriksaan as $detpem){
                                $masuk = -1;
                                $hrg_tmp = 0;
                                for ($l=0; $l < count($array) ; $l++) { 
                                    // echo "masuk";
                                    if ($detpem->JenisPemeriksaan->nama_jenis_pemeriksaan === $array[$i]['my'][$l][2]) {
                                        $masuk = $array[$i]['my'][$l][0];
                                        $hrg_tmp = $array[$i]['my'][$l][1];
                                        // echo "test:pem:"+$masuk+$hrg_tmp;
                                    }
                                }
                                // echo count($array);
                                if($masuk >= 0){
                                    $data[$i]['tindakan_medis'][$masuk][2] +=1;
                                    $data[$i]['tindakan_medis'][$masuk][3] +=$hrg_tmp;
                                }else{
                                    $array[$i]['my'][$j][0] = $j;
                                    $array[$i]['my'][$j][1] = $detpem->sub_total;
                                    $array[$i]['my'][$j][2] = $detpem->JenisPemeriksaan->nama_jenis_pemeriksaan;
                                    $data[$i]['tindakan_medis'][$j][0] = $detpem->id_detail_pemeriksaan;
                                    $data[$i]['tindakan_medis'][$j][1] = $detpem->JenisPemeriksaan->nama_jenis_pemeriksaan;
                                    $data[$i]['tindakan_medis'][$j][2] = 1;
                                    $data[$i]['tindakan_medis'][$j][3] = $detpem->sub_total;
                                    $j++;
                                }
                            }
                        }
                    }
                    // print_r($data[$i]);
                    foreach ($val->TindakanMedis as $key => $v) {
                        $masuk = -1;
                        $hrg_tmp = 0;
                        for ($l=0; $l < count($array[$i]['my']) ; $l++) { 
                            if ($v->tm->tindakanMedis->nama === $array[$i]['my'][$l][2]) {
                                $masuk = $array[$i]['my'][$l][0];
                                $hrg_tmp = $array[$i]['my'][$l][1];
                            }
                        }
                        if($masuk >= 0){
                            $data[$i]['tindakan_medis'][$masuk][2] +=1;
                            $data[$i]['tindakan_medis'][$masuk][3] +=$hrg_tmp;
                        }else{
                            $array[$i]['my'][$j][0] = $j;
                            $array[$i]['my'][$j][1] = $v->harga_total;
                            $array[$i]['my'][$j][2] = $v->tm->tindakanMedis->nama;
                            $data[$i]['tindakan_medis'][$j][0] = $v->id_detail_tindakan_medis;
                            $data[$i]['tindakan_medis'][$j][1] = $v->tm->tindakanMedis->nama;
                            $data[$i]['tindakan_medis'][$j][2] = 1;
                            $data[$i]['tindakan_medis'][$j][3] = $v->harga_total;
                            $j++;
                        }
                    }
                }
                $simpan[$i]['unit'] = $val->poli->nama_poli;
                $simpan[$i]['jml'] = $j;
                $i++;
                // echo '<br>';
            }
        }
        $i = 0;
        $yes = 0;
        return view('rawatInap.cetakBilling2',compact('data','d','id','yes'));
        // dd($data);
    }

    public function verifikasiBilling(Request $request){
        print_r($request->all());
        $data= Pendaftaran::where("id_pendaftaran","=",$request->id_pendaftaran);
        $request->offsetUnset('_token');
        $data->update($request->all());
        return redirect(Auth::user()->poli->prefix.'/dashboard');
    }

    public function cetakGelang($id){
        $data = DetailPendaftaran::where('id_detail_pendaftaran','=',$id)->get();
        return view('cetak.cetak_gelang',compact('data'));
    }

    public function cetakAntrian($id){
        $data = DetailPendaftaran::where('id_detail_pendaftaran','=',$id)->get();
        return view('cetak.cetak_antrian',compact('data'));
    }

    public function cetakKwitansi($id){
        $data = Pendaftaran::where('id_pendaftaran','=',$id)->first();
        return view('CETAK/cetak_kwitansi',compact('data'));
    }

} 