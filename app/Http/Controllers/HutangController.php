<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Hutang;
use App\DetailHutang;
use App\KasKeluar;
use App\Akun;

class HutangController extends Controller
{
	public function dataHutang(){
		$hutang = Hutang::where('id_transaksi','=', null)->get();
		$transaksi = Hutang::whereNotNull('id_transaksi')->get();
		$akun = Akun::All();
		return view('kasir/hutang',compact('hutang','transaksi', 'akun'));
	}

	public function bayarhutang(Request $request){
		$sisatagihan = str_replace(".", "",$request->sisatagihan);
		$jumlahuang = str_replace(".", "",$request->jumlahuang);
		$status_akun = Akun::select('status_akun')->where('id_akun', '=', $request->akun)->get();

		$bayar = new Detailhutang;
		$bayar->id_hutang = $request->id_hutang;
		$bayar->tgl_bayar = $request->tanggalbayar;
		$bayar->jumlah_bayar = $jumlahuang;
		$bayar->sisa_tagihan = $sisatagihan;

		$data = new KasKeluar;
		$data->tgl_kas = $request->tanggalbayar;
		$data->id_transaksi = $request->id_hutang;
		$data->id 		= $request->user;
		$data->id_supplier = $request->id_supplier;
		$data->id_akun = $request->akun;
		$data->jumlah_bayar = $jumlahuang;
		$data->sisa_tagihan = $sisatagihan;
		$data->tgl_jatuh_tempo = $request->jatuhtempo;
		$data->tagihan = $request->netto;
		$data->top = $request->top;
		$data->id_pendaftaran = $request->id_pendaf;
		$data->keterangan = 'Pembayaran Hutang Transaksi';
		$data->jenis_transaksi = "Pembayaran Hutang Transaksi";
		$data->status_akun = $status_akun[0]->status_akun;

		try {
			$bayar->save();
			$data->save();
			$request->session()->flash('alert-info', 'Pembayaran hutang Berhasil Dilakukan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Pembayaran hutang Gagal Dilakukan!');
		}
		return back();
	}

	public function jsonDetailhutang(Request $request){
		if($request->ajax()){
			$id = $request->id;
			$data = Detailhutang::where('id_hutang','=',$id)
			->get();
			return response()->json($data);
		}
	}
}
