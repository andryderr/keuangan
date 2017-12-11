<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\ReturPenjualan;
use App\Penjualan;
use App\DetailPenjualan;
use App\DetailReturPenjualan;
use App\Barang;
use App\Gudang;
use App\MutasiBarang;
use App\KasKeluar;
use App\SettingTransaksi;
use App\Akun;

class ReturPenjualanController extends Controller
{

	public function getMasterReturPenjualan(){
		$data = ReturPenjualan::all();
		return view('farmasi/returPenjualan',compact('data'));
	}

	Public function getDataPenjualan($id){
		$dataPenjualan = Penjualan::join('customer','penjualan_barang.id_customer','=','customer.id_customer')->leftJoin('dokter','penjualan_barang.id_dokter','=','dokter.id_dokter')->where('id_penjualan_barang','=',$id)->where('penjualan_barang.id_penjualan_barang','=',$id)->whereIn('penjualan_barang.kat_barang',['Obat','Alat Medis','Psikotropika','Narkotika','Prekursor Farmasi','Obat Tertentu'])->get();
		dd($dataPenjualan);
		// return json_encode($dataPenjualan);
	}

	public function getDataTabelReturPenjualan($id){
		$data = DetailPenjualan::join('barang','detail_penjualan.id_barang','=','barang.id_barang')->where('id_penjualan_barang','=',$id)->get();
		return json_encode($data);
	}

	public function tambahMasterReturPenjualan(Request $request){
		$data = new ReturPenjualan;
		$data->id_penjualan_barang = $request->id_penjualan;
		$data->tanggal_retur = $request->tgl_retur;
		$data->keterangan = $request->keterangan;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		 // return redirect("FARMASI/returObat/".$request->id_supplier."/");
		return back();
	}

	public function hapusMasterReturPenjualan($id){
		$data = ReturPenjualan::where('id_retur_pen', $id);
		$data->delete();
		return back();
	}

	public function getAllReturPenjualan($id){
		$data = ReturPenjualan::where('id_retur_pen','=',$id)->get();
		$detail = DetailReturPenjualan::where('id_retur_pen','=',$id)->get();
		$barangsama = DetailReturPenjualan::select(DB::raw("id_barang as id_bar, sum(jumlah_kecil) as jumlah"))->where('id_retur_pen', '=', $id)->groupBy('id_barang')->get();
		$dataGudang = Gudang::All();
		return view('farmasi/detail_returPenjualan', compact('data','detail','dataGudang','barangsama'));
	}

	public function tambahDetailReturPenjualan(Request $request){
		$data = new DetailReturPenjualan;
		$data->id_retur_pen  			= $request->id_retur;
		$data->id_barang            = $request->id_bahan;
		$data->satuan               = $request->satuan;
		$data->jumlah               = $request->qty_retur;
		$data->jumlah_kecil         = $request->jumlah_kecil;
		$data->harga                = $request->harga;
		$data->biaya_racik          = $request->biaya_racik;
		$data->biaya_resep          = $request->biaya_resep;
		$data->diskon_rp            = $request->diskon_rp;
		$data->diskon_rp1           = $request->diskon1;
		$data->diskon_rp2           = $request->diskon2;
		$data->sub_total            = $request->subtotal;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Retur Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Retur Gagal Dimasukkan!');
		}
		return back();
	}

	public function hapusDetailReturPenjualan($id, Request $request){
		$data = DetailReturPenjualan::where('id_detail_retur', $id);
		try {
			$data->delete();
			$request->session()->flash('alert-danger', 'Data Retur Berhasil Dihapus!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Retur Gagal Dihapus!');
		}
		return back();
	}

	public function updateMasterPenjualan(Request $request){
		$totalbeli = $request->totalbeli;
		$totalretur = $request->total_retur;
		$data = SettingTransaksi::where('jenis_transaksi', '=', 'Retur Penjualan')->get();
		$status_akun = Akun::where('id_akun', '=', $data[0]->id_akun)->get();
		if ($totalretur > $totalbeli) {			
			$request->session()->flash('alert-danger', 'Total Retur Melebihi Total Pembelian !');
			return back();
		}else{
			$netto = str_replace(".", "",$request->netto);
			$sisatagihan = str_replace(".", "",$request->sisatagihan);
			$bayarnya = str_replace(".", "",$request->bayaruangmuka);
			if ($request->kat_bayar == 'Tunai') {
				$update = ReturPenjualan::where('id_retur_pen','=', $request->id_retur)->update([
					'total'         => $request->total_retur,
					'kat_barang' => $request->kat_barang,
					'diskon'        => $request->diskonrptampil,
					'netto'         => $netto,
					'jenis_bayar'   => $request->kat_bayar,
					'jumlah_bayar'  => $request->bayaruangmuka,
					'id_gudang'     => $request->pilihgudang, 
					'ppn'           => $request->ppnpersen,
					'ppn_rupiah'    => $request->ppnrupiah,
					]);
				for ($i=0; $i < count($request->id_bar) ; $i++) {
					$update1 = MutasiBarang::where('id_barang', '=', $request->id_bar[$i])->where('id_gudang','=', $request->pilihgudang)->increment('qty_retur_penjualan', $request->j_kecil[$i]);
				}
				
				// masih belum masuk ke kas keluar
				$kas = new KasKeluar;
				$kas->tgl_kas = $request->tgl_retur;
				$kas->id_supplier = $request->id_supplier;
				$kas->tagihan = $netto;
				$kas->id_transaksi = $request->id_retur;
				$kas->id_customer = $request->id_customer;
				$kas->id_pendaftaran = $request->id_pendaftaran;
				$kas->id 		= 1;
				$kas->id_akun = $request->id_akun;
				$kas->jumlah_bayar = $bayarnya - ($bayarnya - $netto);
				$kas->keterangan = "Retur Penjualan";
				$kas->jenis_transaksi = "Retur Penjualan";
				$kas->status_akun = $status_akun[0]->status_akun;
				$kas->save();
				
			}else{
				$netto = str_replace(".", "",$request->netto);
				$update = ReturPenjualan::where('id_retur_pen','=', $request->id_retur)->update([
					'total'         => $request->total_retur,
					'kat_barang' => $request->kat_barang,
					'diskon'        => $request->diskonrptampil,
					'netto'         => $netto,
					'jenis_bayar'   => $request->kat_bayar,
					'top'           => $request->top,
					'uang_muka'     => $request->bayaruangmuka,
					'id_gudang'     => $request->pilihgudang, 
					'ppn'           => $request->ppnpersen,
					'ppn_rupiah'    => $request->ppnrupiah,
					]);
				for ($i=0; $i < count($request->id_bar) ; $i++) {
					$update1 = MutasiBarang::where('id_barang', '=', $request->id_bar[$i])->where('id_gudang','=', $request->pilihgudang)->increment('qty_retur_penjualan', $request->j_kecil[$i]);
				}
				$kas = new KasKeluar;
				$kas->tgl_jatuh_tempo = $request->jatuhtempo;
				$kas->tgl_kas = $request->tgl_retur; 
				$kas->top = $request->top;
				$kas->tagihan = $netto;
				$kas->sisa_tagihan = $sisatagihan;
				$kas->id_transaksi = $request->id_retur;
				$kas->id_customer = $request->id_customer;
				$kas->id_pendaftaran = $request->id_pendaftaran;
				$kas->id 		= 1;
				$kas->id_akun = $request->id_akun;
				$kas->jumlah_bayar = $bayarnya;
				$kas->keterangan = "Retur Penjualan";
				$kas->jenis_transaksi = "Retur Penjualan";
				$kas->status_akun = $status_akun[0]->status_akun;
				$kas->save();

				$hutang = new Hutang;
				$hutang->tgl_jatuh_tempo = $request->jatuhtempo;
				$hutang->tgl_piutang = $request->tgl_retur; 
				$hutang->top = $request->top;
				$hutang->tagihan = $netto;
				$hutang->sisa_tagihan = $sisatagihan;
				$hutang->id_customer = $request->id_customer;
				$hutang->id_transaksi = $request->id_retur;
				$hutang->id 		= 1;
				$hutang->id_akun = $status_akun[0]->id_akun;
				$hutang->jumlah_bayar = $bayarnya;
				$hutang->jenis_transaksi = "Retur Penjualan";
				$hutang->status_akun = $status_akun[0]->status_akun;	
				$hutang->save();	
			}
			if ($update) {
				$request->session()->flash('alert-info', 'Retur Penjualan Berhasil Dilakukan!');
			}else{
				$request->session()->flash('alert-warning', 'Retur Penjualan Gagal Dimasukkan!');
			}	
		}		
		return redirect('FARMASI/masterReturPenjualan');
	}
}
