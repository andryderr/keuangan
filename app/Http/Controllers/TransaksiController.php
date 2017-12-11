<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pasien;
use App\Transaksi;

use DB;

class TransaksiController extends Controller
{

    public function index($poli,$id,$test)
    {
    }

    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $noRm = Pasien::getNoRm();
        // $dataPasien = [
        //     'nama_pasien' => $request->namaPasien,
        //     'jenis_kelamin' => $request->jenisKelamin,
        //     'tanggal_lahir' => $request->tanggalLahir,
        //     'kabupaten' => $request->kabupaten,
        //     'kecamatan' => $request->kecamatan,
        //     'desa' => $request->desa,
        //     'dusun' => $request->dusun,
        //     'tempat_lahir' => $request->tempatLahir,
        //     'berat_lahir' => $request->beratLahir,
        //     'golongan_darah' => $request->golonganDarah,
        //     'agama' => $request->agama,
        //     'status' => $request->status,
        //     'pekerjaan' => $request->pekerjaan,
        //     'jenis_identitas' => $request->jenisIdentitas,
        //     'no_identitas' => $request->noIdentitas,
        //     'telepon' => $request->telepon,
        //     'nama_ortu' => $request->namaOrangTua,
        //     'nama_suami_istri' => $request->namaSuamiIstri
        // ];

        // $dataTransaksi = [
        //     'no_kepesertaan' => $request->noKepesertaan,
        //     'no_sep' => $request->no_sep,
        //     'jenis_pasien' => $request->jenisPasien,
        //     'no_rm' => $request->no_rm,
        //     'kunjungan_ke' => $request->kunjunganKe,
        //     'umur' => $request->umur,
        //     'kategori_usia' => $request->kategoriUsia,
        //     'no_antri' => $request->noAntri,
        //     'cara_masuk' => $request->caraMasuk,
        //     'rujukan' => $request->rujukan,
        //     'nama_perujuk' => $request->namaPerujuk,
        //     'tujuan_berobat' => $request->tujuanBerobat,
        //     'tujuan_poli' => $request->namaPoli
        // ];

        $dataTrans = ['nama_pasien' => 'test'];

        DB::beginTransaction();

        try {
            $data = DB::table("pasien")->insertGetId($dataTrans);
            echo $data;
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
        }
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
