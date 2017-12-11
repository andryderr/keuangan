<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;
use Crypt;
use Config;

class UserController extends Controller
{
    function hapus($id){
    	$data = User::where('id','=',$id);
    	$data->update(['status' => 'Inactive']);
    	return back();
    }

    function active($id){
    	$data = User::where('id','=',$id);
    	$data->update(['status' => 'Active']);
    	return back();
    }

    function update(Request $request){
    	$data = User::find($request->id);
    	$data->update($request->all());
    	return back();
    }

    function register(Request $request){
        $data = new User;
        $data->name = $request->name;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->id_poli = $request->id_poli;
        $data->email = $request->email;
        $data->save();
        return back();
    }

    function viewRegister(){
        $poli = Poli::all();
        return view('auth.viewRegister',compact('poli'));
    }

    function updatePassword(Request $request){
        $id = Auth::user()->id;
        if ($request->passwordBaru1 == $request->passwordBaru2) {
            $data = User::where('id','=',$id);
            $data->update(['password' => bcrypt($request->passwordBaru1)]);
            Session::flash('message', 'Berhasil Menambah Data'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect()->back();
        }
        Session::flash('message', 'Gagal Ganti Password Konfirmasi Password Salah'); 
        Session::flash('alert-class', 'alert-warning'); 
        return redirect()->back();
    }

    function viewGantiPassword(){
        $data = Auth::user();
        return view('new.lain_lain.gantiPassword',compact('data'));
    }
}