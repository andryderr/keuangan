<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// PENDAFTARAN

Route::get('PENDAF/pendaftaran', function () {
    return view('pendaf/pendaftaran');
});

Route::get('PENDAF/dashboard', function () {
    return view('pendaf/dashboard');
});

Route::get('PENDAF/pasien', function () {
    return view('pendaf/dataPasien');
});


// IGD

Route::get('IGD/dashboard', function () {
    return view('igd/dashboard');
});

Route::get('IGD/pendaftaran', function () {
    return view('igd/pendaftaran');
});

Route::get('IGD/jenisDiagnosa', function () {
    return view('igd/jenisDiagnosa');
});

Route::get('IGD/dataDokter', function () {
    return view('igd/dataDokter');
});

Route::get('IGD/dataPasien/pasienDirawat', function () {
    return view('igd/dataPasien');
});

Route::get('IGD/dataPasien/pasienKeluar', function () {
    return view('igd/pasienKeluar');
});

Route::get('IGD/dataPetugasMedis', function () {
    return view('igd/dataPetugasMedis');
});

Route::get('IGD/jenisTindakanMedis', function () {
    return view('igd/jenisTindakanMedis');
});

// Route::get('IGD/detailTindakanMedis/{id}', function () {
Route::get('IGD/detailTindakanMedis', function () {
    return view('igd/detailTindakanMedis');
});

Route::get('IGD/dataPasien/diagnosaPasien', function () {
    return view('igd/diagnosaPasien');
});

Route::get('IGD/dataPasien/feeTindakanMedis', function () {
    return view('igd/settingFeeJenisTindakan');
});

// POLI

Route::get('POLI/dashboard', function () {
    return view('poli/dashboard');
});

Route::get('POLI/pendaftaran', function () {
    return view('poli/pendaftaran');
});

Route::get('POLI/jenisDiagnosa', function () {
    return view('poli/jenisDiagnosa');
});

Route::get('POLI/dataDokter', function () {
    return view('poli/dataDokter');
});

Route::get('POLI/dataPasien/pasienDirawat', function () {
    return view('poli/dataPasien');
});

Route::get('POLI/dataPasien/pasienKeluar', function () {
    return view('poli/pasienKeluar');
});

Route::get('POLI/dataPetugasMedis', function () {
    return view('poli/dataPetugasMedis');
});

Route::get('POLI/jenisTindakanMedis', function () {
    return view('poli/jenisTindakanMedis');
});

// Route::get('POLI/detailTindakanMedis/{id}', function () {
Route::get('POLI/detailTindakanMedis', function () {
    return view('poli/detailTindakanMedis');
});

Route::get('POLI/dataPasien/diagnosaPasien', function () {
    return view('poli/diagnosaPasien');
});

Route::get('POLI/jenisPoli', function () {
    return view('poli/jenisPoli');
});


// Rawat Inap

Route::get('RWINAP/dashboard', function () {
    return view('rawatInap/dashboard');
});
Route::get('RWINAP/dashboard', function () {
    return view('rawatInap/dashboard');
});








//Route Andry Dermawan
Route::get('G/IGD/dataPasien','PasienController@index');