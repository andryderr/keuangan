<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterJurnal;
use App\Posting;
use App\DetailJurnal;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keuangan/dashboard');
    }

    public function indexPosting(Request $request)
    {
        $tglinput1 = strtotime(substr($request->cari, 0,10));
        $tglinput2 = strtotime(substr($request->cari, 12,21).' + 1 days');
        $tgl1 = date('Y-m-d',$tglinput1);
        $tgl2 = date('Y-m-d',$tglinput2);
        // print_r($tgl1);
        // print_r($tgl2);
        $data = Posting::whereBetween('tgl_transaksi', [$tgl1, $tgl2])->get();
        // printf($data);
        return view('keuangan/posting', compact('data'));
    }

    public function tabel_posting(Request $request){
        $tglinput1 = strtotime(substr($request->cari, 0,10));
        $tglinput2 = strtotime(substr($request->cari, 12,21).' + 1 days');
        $tgl1 = date('Y-m-d',$tglinput1);
        $tgl2 = date('Y-m-d',$tglinput2);
        // print_r($tgl1);
        // print_r($tgl2);
        $data = Posting::whereBetween('tgl_transaksi', [$tgl1, $tgl2])->paginate(2);
        return view('keuangan.tabel_posting',compact('data'));
    }

    public function jurnalUmum()
    {
        $master = MasterJurnal::All();

        return view('keuangan/master_jurnal', compact('master', 'data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createMasterJurnal(Request $request)
    {
        $data = new MasterJurnal;

        $data->jenis_jurnal = $request->jenis_jurnal;
        $data->tgl_jurnal = $request->tgl_jurnal;

        try {
            $data->save();
            $request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
        } catch (Exception $e) {
            $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function detailJurnal($id)
    {
        $master = MasterJurnal::where('id_jurnal', '=', $id)->get();
        $data = DetailJurnal::where('id_jurnal', '=', $id)->get();

        return view('keuangan/detail_jurnal', compact('master', 'data'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
