<?php

namespace App\Http\Controllers;

use App\DetailDokterPoli;
use App\Dokter;
use App\Http\Requests;
use App\Poli;
use App\ViewDetailDokterPoli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{

    public function index()
    {
        $data = Dokter::all();
        return view('dokter',['data' => $data]);
    }

    public function igd(){
        $data = Dokter::All();
        return view('new.igd.dataDokter',compact('data'));
    }

    public function tambahIGD(Requests $request){
        $data = new DetailDokterPoli;
        $data->create($request->all());
        return redirect('IGD/Data/Dokter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Dokter;
        $data->insert($request->toArray());
        return redirect('Dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($poli,$id)
    {
        $data = Dokter::where('id_dokter','=',$id)->get();
        return json_encode($data);
    }

    public function showAll()
    {
        $data = Dokter::where("id_dokter","<>",0)->get();
        return json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($poli,$id)
    {
        $data = Dokter::where('id_dokter','=',$id);
        return json_encode($data);
    }

    public function update(Request $request,$poli,$id)
    {
        $request->
        $data = Dokter::where('id_dokter','=',$id);
        $data->update($request);
        return redirect('dokter');
    }

    public function destroy($poli,$id)
    {
        $data = Dokter::where('id_dokter','=',$id);
        return redirect('dokter');
    }
}
