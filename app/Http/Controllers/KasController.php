<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pendaftaran;
use App\KasMasuk;
use App\KasKeluar;
use App\Akun;
use App\Piutang;
use App\KasHarian;
use App\Penjualan;
use App\SettingTransaksi;
use App\DetailAkun;
use Carbon\Carbon;
use DB;
use Auth;

class KasController extends Controller
{
	use PostingController;
	public function dataKasMasuk(){
		$kasmasuk = KasMasuk::all();
		$kaskeluar = KasKeluar::all();
		$akun = Akun::where('status_akun','=','Kas')->get();
		return view('kasir/kas_masuk', compact('kasmasuk','akun','kaskeluar'));
	}

	public function dataPembayaran(){
		$data = Pendaftaran::where('status_selesai','=','0')->get();
		$akun = Akun::all();	
		$totaltagihan = DB::table('pendaftaran')->count();
		$belumbayar = Pendaftaran::where('status_selesai','=','0')->count();
		$sudahbayar = Pendaftaran::where('status_selesai','=','1')->count();
		return view('kasir/dashboard', compact('data','akun','totaltagihan','belumbayar','sudahbayar'));
	}

	public function dataHistory(){
		$data = Pendaftaran::where('status_selesai','=',1)->get();
		return view('kasir/riwayat_pembayaran',compact('data'));
	}

	public function pembayaranFarmasi(){
		$akun = Akun::all();
		$penjualan = Penjualan::where('kat_pembeli', '=', 'Umum')->where('total', '>', '0')->where('jumlah_bayar', '<=', '0')->get();
		return view('kasir/pembayaranFarmasi', compact('akun', 'penjualan'));
	}

	public function tambahKasMasuk(Request $request){
		$jml = str_replace(".", "",$request->jumlahuang);
		$status_akun = Akun::select('status_akun')->where('id_akun', '=', $request->akun)->get();
		$data = new KasMasuk;
		$data->tgl_kas = $request->tgl_kas;
		$data->id 		= Auth::user()->id;
		$data->id_akun = $request->akun;
		$data->jumlah_bayar = $jml;
		$data->keterangan = $request->keterangan;
		$data->id_transaksi = '';
		$data->jenis_transaksi = "Kas Masuk";
		$data->status_akun = $status_akun[0]->status_akun;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}

	public function tambahKasKeluar(Request $request){
		$jml = str_replace(".", "",$request->jumlahuang);
		$status_akun = Akun::select('status_akun')->where('id_akun', '=', $request->akun)->get();
		$data = new KasKeluar;
		$data->tgl_kas = $request->tgl_kas;
		$data->id 		= Auth::user()->id;
		$data->id_akun = $request->akun;
		$data->jumlah_bayar = $jml;
		$data->keterangan = $request->keterangan;
		$data->jenis_transaksi = "Kas Keluar";
		$data->status_akun = $status_akun[0]->status_akun;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		return back();
	}


	public function tambahPembayaran(Request $request){
		$jml = str_replace(".", "",$request->jumlahuang);
		$netto = $request->netto;
		$bayar = $jml - ($jml - $netto);
		$sisatagihan = str_replace(".", "",$request->sisatagihan);

		$katbayar = $request->kat_bayar;
		$data = new KasMasuk;
		$data->tgl_jatuh_tempo = $request->jatuhtempo;
		$data->tgl_kas = $request->tanggalbayar;
		$data->top = $request->top;
		$data->tagihan = $request->netto;
		$data->sisa_tagihan = $sisatagihan;
		$data->id_transaksi = '';
		$data->id_pendaftaran = $request->id_pendaf;
		$data->id 		= Auth::user()->id;
		$data->id_akun = $request->akun;
		$data->jumlah_bayar = $bayar;
		$data->jenis_transaksi = 'Billing Pasien';
		$data->keterangan = $request->keterangan;

		$piutang = new Piutang;
		$piutang->tgl_jatuh_tempo = $request->jatuhtempo;
		$piutang->tgl_piutang = $request->tanggalbayar;
		$piutang->top = $request->top;
		$piutang->tagihan = $request->netto;
		$piutang->sisa_tagihan = $sisatagihan;
		$piutang->id_pendaftaran = $request->id_pendaf;
		$piutang->id 		= Auth::user()->id;
		$piutang->id_akun = $request->akun;
		$piutang->jumlah_bayar = $jml;
		$piutang->keterangan = $request->keterangan;

		try {
			if ($katbayar == "Kredit") {
				$data->save();
				$piutang->save();
				$request->session()->flash('alert-info', 'Pembayaran dan Piutang Berhasil Dilakukan!');
			}else{
				$data->save();
				$request->session()->flash('alert-info', 'Pembayaran Berhasil Dilakukan!');
			}
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Pembayaran Gagal Dilakukan!');
		}
		$pasien = Pendaftaran::where('id_pendaftaran','=',$request->id_pendaf);
		$pasien->update(['status_selesai' => 1 ]);
		$pasien->update(['potongan' => str_replace(".", "",$request->potongan)]);
		$location = url('KASIR/cetakKwitansi/'.$request->id_pendaf);
		echo "<script language='javascript'>window.open(".$location.",'_blank');</script>";
		return back();
	}

	public function simpanPembayaran(Request $request){
		$jml = str_replace(".", "",$request->jumlahuang);
		$sisatagihan = str_replace(".", "",$request->sisatagihan);
		$data1 = SettingTransaksi::where('jenis_transaksi', '=', 'Penjualan')->get();
		$status_akun = Akun::where('id_akun', '=', $data1[0]->id_akun)->get();
		$netto = $request->netto_master;
		$sisa = ($jml - ($jml - $netto)) - $netto;
		$penjualan = Penjualan::where('id_penjualan_barang','=', $request->id_penjualan_barang)->get();

		$tgl_penjualan = $penjualan[0]->tanggal_penjualan;
		$katbayar = $request->kat_bayar;
		$data = new KasMasuk;
		$data->id_transaksi = $request->id_penjualan_barang;
		$data->tgl_jatuh_tempo = $request->jatuhtempo;
		$data->tgl_kas = $request->tanggalbayar;
		$data->top = $request->top;
		$data->tagihan = $netto;
		$data->sisa_tagihan = '0';
		$data->id_pendaftaran = $request->id_pendaf;
		$data->id 		= Auth::user()->id;
		$data->id_akun = $request->akun;
		$data->jumlah_bayar = ($jml - ($jml - $netto));
		$data->keterangan = $request->keterangan;
		$data->jenis_transaksi = $data1[0]->jenis_transaksi;

		$piutang = new Piutang;
		$piutang->id_transaksi = $request->id_penjualan_barang;
		$piutang->tgl_jatuh_tempo = $request->jatuhtempo;
		$piutang->tgl_piutang = $request->tanggalbayar;
		$piutang->top = $request->top;
		$piutang->tagihan = $request->netto;
		$piutang->sisa_tagihan = $sisa;
		$piutang->id_pendaftaran = $request->id_pendaf;
		$piutang->id 		= Auth::user()->id;
		$piutang->id_akun = $request->akun;
		$piutang->jumlah_bayar = ($jml - ($jml - $netto));
		$piutang->keterangan = $request->keterangan;
		$nama_transaksi = "Penjualan";
		try {
			if ($katbayar == "Kredit") {
				$data->save();
				$piutang->save();
				$request->session()->flash('alert-info', 'Pembayaran dan Piutang Berhasil Dilakukan!');
				$update = Penjualan::where('id_penjualan_barang','=', $request->id_penjualan_barang)->update([
					'diskon'        => $request->diskon_master,
					'jenis_bayar'   => $request->katbayar,
					'top'           => $request->top_master,
					'uang_muka'     => $jml,
					'ppn'           => $request->ppnpersen,
					'ppn_rupiah'    => $request->ppnrupiah,
					'total'			=> $request->netto_master,
					'netto'			=> $request->netto_master,
				]);

				$this->posting($request, $request->id_penjualan_barang, $nama_transaksi, $tgl_penjualan, "penjualan kredit", $jml, $sisa, $request->diskon_master, $request->ppnrupiah );

			}else{
				$data->save();
				$request->session()->flash('alert-info', 'Pembayaran Berhasil Dilakukan!');

				$update = Penjualan::where('id_penjualan_barang','=', $request->id_penjualan_barang)->update([
					'diskon'        => $request->diskon_master,
					'jenis_bayar'   => $request->katbayar,
					'jumlah_bayar'  => ($jml - ($jml - $netto)),
					'ppn'           => $request->ppnpersen,
					'ppn_rupiah'    => $request->ppnrupiah,
					'total'			=> $request->netto_master,
					'netto'			=> $request->netto_master,
				]);
				$this->posting($request, $request->id_penjualan_barang, $nama_transaksi, $tgl_penjualan, "penjualan", ($jml - ($jml - $netto)), 0, $request->diskon_master, $request->ppnrupiah );
			}
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Pembayaran Gagal Dilakukan!');
		}
		return redirect("KASIR/notaPenjualan/".$request->id_penjualan_barang);
	}

	public function laporanKasHarian()
	{
		date_default_timezone_set("Asia/Jakarta");
		$data = KasHarian::whereDate('tgl_kas_harian', '=', Carbon::today())->get();
		// echo $data[0];
		$akun = Akun::all();
		$saldoawal = DB::table('detail_akun')
		->join('akun','akun.id_akun','=','detail_akun.id_akun')
		->whereRaw('detail_akun.bulan = month(current_date)')
		->whereRaw('detail_akun.tahun = year(current_date)')
		->where('akun.status_akun','=','Kas')
		->selectRaw('sum(detail_akun.saldo_awal) as saldoawal')
		->get();
		return view('kasir/laporan_kasHarian', compact('data','akun','saldoawal'));
	}

	public function filterLaporanHarian(Request $request){
		$tglinput1 = strtotime(substr($request->tanggal, 0,10));
		$tglinput2 = strtotime(substr($request->tanggal, 12,21).' + 1 days');
		$tgl1 = date('Y-m-d',$tglinput1);
		$tgl2 =  date('Y-m-d',$tglinput2);
		$akunfilter = $request->akun;
		$akun = Akun::all();
		$saldoawal = DB::table('detail_akun')
		->join('akun','akun.id_akun','=','detail_akun.id_akun')
		->whereRaw('detail_akun.bulan = month(current_date)')
		->whereRaw('detail_akun.tahun = year(current_date)')
		->where('akun.status_akun','=','Kas')
		->selectRaw('sum(detail_akun.saldo_awal) as saldoawal')
		->get();
		date_default_timezone_set("Asia/Jakarta");
		if ($akunfilter == 'semua') {
			$data = KasHarian::whereBetween("tgl_kas_harian", [$tgl1, $tgl2])->get();
			return view('kasir/laporan_kasHarian', compact('data','akun','saldoawal'));
		}else{
			$data = KasHarian::where('id_akun','=',$akunfilter)->whereBetween("tgl_kas_harian", [$tgl1, $tgl2])->get();
			return view('kasir/laporan_kasHarian', compact('data','akun','saldoawal'));
		}
	}
}
