<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\PetugasMedis;
use App\ViewDetailPetugasPoli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PetugasMedis::All();
        return view('PetugasMedis',['data' => $data]);
    }

    public function igd(){
        $data = PetugasMedis::All();
        return view('new.igd.dataPetugasMedis',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CreatePetugasMedis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new PetugasMedis;
        $data->insert($request);
    }

    public function show($poli,$id)
    {
        $data = PetugasMedis::where('id_petugas_medis','=',$id)->get();
        return json_encode($data);
    }

    public function showAll()
    {
        $data = PetugasMedis::where("id_petugas_medis","<>",0)->get();
        return json_encode($data);
    }

    public function edit($poli,$id)
    {
        $data = PetugasMedis::where('id_petugas_medis','=',$id)->get();
        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$poli,$id)
    {
        $data = PetugasMedis::where('id_petugas_medis','=',$id);
        $data->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($poli,$id)
    {
        $data = PetugasMedis::where('id_petugas_medis','=',$id);
        $data->delete();
    }
}
