<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Piutang;
use App\DetailPiutang;
use App\KasMasuk;
use App\Akun;

class PiutangController extends Controller
{
	public function dataPiutang(){
		$piutang = Piutang::where('id_transaksi','=', null)->get();
		$transaksi = Piutang::whereNotNull('id_transaksi')->get();
		$akun = Akun::All();
		return view('kasir/piutang',compact('piutang','transaksi', 'akun'));
	}

	public function bayarPiutang(Request $request){
		$sisatagihan = str_replace(".", "",$request->sisatagihan);
		$jumlahuang = str_replace(".", "",$request->jumlahuang);
		$status_akun = Akun::select('status_akun')->where('id_akun', '=', $request->akun)->get();

		$bayar = new DetailPiutang;
		$bayar->id_piutang = $request->idpiutang;
		$bayar->tgl_bayar = $request->tanggalbayar;
		$bayar->jumlah_bayar = $jumlahuang;
		$bayar->sisa_tagihan = $sisatagihan;

		$data = new KasMasuk;
		$data->tgl_kas = $request->tanggalbayar;
		$data->id_transaksi = $request->idpiutang;
		$data->id 		= $request->user;
		$data->id_akun = $request->akun;
		$data->jumlah_bayar = $jumlahuang;
		$data->sisa_tagihan = $sisatagihan;
		$data->tgl_jatuh_tempo = $request->jatuhtempo;
		$data->tagihan = $request->netto;
		$data->top = $request->top;
		$data->id_supplier = $request->id_supplier;
		$data->id_pendaftaran = $request->id_pendaf;
		$data->keterangan = 'Pembayaran Piutang';
		$data->jenis_transaksi = "Pembayaran Piutang Kredit";
		$data->status_akun = $status_akun[0]->status_akun;

		try {
			$bayar->save();
			$data->save();
			$request->session()->flash('alert-info', 'Pembayaran Piutang Berhasil Dilakukan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Pembayaran Piutang Gagal Dilakukan!');
		}
		return back();
	}

	public function jsonDetailPiutang(Request $request){
		if($request->ajax()){
			$id = $request->id;
			$data = DetailPiutang::where('id_piutang','=',$id)
			->get();
			return response()->json($data);
		}
	}
}
