<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class DashboardController extends Controller
{
	function utilitas(){
		return view('new.utilitas.dashboard');
	}
	function refresh(){
		$data = DB::select('show tables');
    	// print_r($data);
    	// dd($data);
		echo $data[0]->Tables_in_rs2;
		foreach ($data as $key => $value) {
			DB::table($value->Tables_in_rs2)->truncate();
    		// echo $value->Tables_in_rs2;
		}
		echo "oke";
	}
}
