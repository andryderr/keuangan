<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use App\ReturPembelian;
use App\DetailReturPembelian;
use App\Pembelian;
use App\DetailPembelian;
use App\Gudang;
use App\Barang;
use App\MutasiBarang;
use App\KasMasuk;
use App\SettingTransaksi;
use App\Akun;
use App\Piutang;

class ReturPembelianController extends Controller
{
	public function index(){
		$status = 1;
		return view('farmasi/returObat',compact('status'));
	}

	Public function getDataPembelian($id){
		$dataPembelian = Pembelian::join('supplier','pembelian_barang.id_supplier','=','supplier.id_supplier')->where('id_pembelian_barang','=',$id)->get();
		return json_encode($dataPembelian);
	}

	public function getDataTabelReturPembelian($id){
		$data = DetailPembelian::join('barang','detail_pembelian.id_barang','=','barang.id_barang')->where('id_pembelian_barang','=',$id)->get();
		return json_encode($data);
	}

	public function tambahMasterReturPembelian(Request $request){
		$data = new ReturPembelian;
		$data->id_pembelian_barang = $request->id_pembelian;
		$data->tanggal_retur = $request->tgl_retur;
		$data->keterangan = $request->keterangan;
		$data->id_supplier = $request->id_supplier;
		try {
			$data->save();
			$request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
		}
		 // return redirect("FARMASI/returObat/".$request->id_supplier."/");
		return back();
	}

	public function hapusMasterReturPembelian($id){
		$data = ReturPembelian::where('id_retur', $id);
		$data->delete();
		return back();
	}

	public function getMasterReturPembelian($id){
		$data = ReturPembelian::where('id_retur','=',$id)->get();
		$detail = DetailReturPembelian::where('id_retur','=',$id)->get();
		$barangsama = DetailReturPembelian::select(DB::raw("id_barang as id_bar, sum(jumlah_kecil) as jumlah"))->where('id_retur', '=', $id)->groupBy('id_barang')->get();
		$dataGudang = Gudang::All();
		return view('farmasi/returObat', compact('data','detail','dataGudang','barangsama','akun'));
	}

	public function getMReturPembelian(){
		$master = ReturPembelian::all();
		return view('farmasi/master_returPembelian', compact('master'));
	}

	public function tambahDetailReturPembelian(Request $request){
		$subtotal = str_replace(".", "",$request->subtotal);
		$data = new DetailReturPembelian;
		$data->id_retur  			= $request->id_retur;
		$data->id_barang            = $request->id_bahan;
		$data->satuan               = $request->satuan;
		$data->jumlah               = $request->qty_retur;
		$data->jumlah_kecil         = $request->jumlah_kecil;
		$data->harga                = $request->harga;
		$data->diskon_rp            = $request->diskon_rp;
		$data->diskon_rp1           = $request->diskon1;
		$data->diskon_rp2           = $request->diskon2;
		$data->sub_total            = $subtotal;
		try {
			$data->save();				
			$request->session()->flash('alert-info', 'Data Retur Berhasil Dimasukkan!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Retur Gagal Dimasukkan!');
		}
		return back();
	}

	public function hapusDetailReturPembelian($id, Request $request){
		$data = DetailReturPembelian::where('id_detail_retur', $id);
		try {
			$data->delete();				
			$request->session()->flash('alert-danger', 'Data Retur Berhasil Dihapus!');
		} catch (Exception $e) {
			$request->session()->flash('alert-warning', 'Data Retur Gagal Dihapus!');
		}
		return back();
	}

	public function updateMasterPembelian(Request $request){
		$totalbeli = $request->totalbeli;
		$totalretur = $request->total_retur;
		$data = SettingTransaksi::where('jenis_transaksi', '=', 'Retur Pembelian')->get();
		$status_akun = Akun::where('id_akun', '=', $data[0]->id_akun)->get();
		if ($totalretur > $totalbeli) {			
			$request->session()->flash('alert-danger', 'Total Retur Melebihi Total Pembelian !');
			return back();
		}else{
			$netto = str_replace(".", "",$request->netto);
			$sisatagihan = str_replace(".", "",$request->sisatagihan);
			$bayarnya = str_replace(".", "",$request->bayaruangmuka);

			if ($request->kat_bayar == 'Tunai') {
				$update = ReturPembelian::where('id_retur','=', $request->id_retur)->update([
					'total'         => $request->total_retur,
					'kat_barang' => $request->kat_barang,
					'diskon'        => $request->diskonrptampil,
					'netto'         => $netto,
					'jenis_bayar'   => $request->kat_bayar,
					'jumlah_bayar'  => $bayarnya - ($bayarnya - $netto),
					'id_gudang'     => $request->pilihgudang, 
					'ppn'           => $request->ppnpersen,
					'ppn_rupiah'    => $request->ppnrupiah,
					]);
				for ($i=0; $i < count($request->id_bar) ; $i++) {
					$update1 = MutasiBarang::where('id_barang', '=', $request->id_bar[$i])->where('id_gudang','=', $request->pilihgudang)->increment('qty_retur_pembelian', $request->j_kecil[$i]);					
				}
				$kas = new KasMasuk;
				$kas->tgl_jatuh_tempo = $request->jatuhtempo;
				$kas->tgl_kas = $request->tgl_retur;
				$kas->id_supplier = $request->id_supplier;
				$kas->tagihan = $netto;
				$kas->id_transaksi = $request->id_retur;
				$kas->id 		= 1;
				$kas->id_akun = $status_akun[0]->id_akun;
				$kas->jumlah_bayar = $bayarnya - ($bayarnya - $netto);
				$kas->keterangan = "Retur Pembelian";
				$kas->jenis_transaksi = "Retur Pembelian";
				$kas->status_akun = $status_akun[0]->status_akun;
				$kas->save();
				
			}else{
				$netto = str_replace(".", "",$request->netto);
				$sisatagihan = str_replace(".", "",$request->sisatagihan);

				$update = ReturPembelian::where('id_retur','=', $request->id_retur)->update([
					'total'         => $request->total_retur,
					'kat_barang' => $request->kat_barang,
					'diskon'        => $request->diskonrptampil,
					'netto'         => $netto,
					'jenis_bayar'   => $request->kat_bayar,
					'top'           => $request->top,
					'uang_muka'     => $bayarnya,
					'id_gudang'     => $request->pilihgudang, 
					'ppn'           => $request->ppnpersen,
					'ppn_rupiah'    => $request->ppnrupiah,
					]);
				for ($i=0; $i < count($request->id_bar) ; $i++) {
					$update1 = MutasiBarang::where('id_barang', '=', $request->id_bar[$i])->where('id_gudang','=', $request->pilihgudang)->increment('qty_retur_pembelian', $request->j_kecil[$i]);								
				}
				$kas = new KasMasuk;
				$kas->tgl_jatuh_tempo = $request->jatuhtempo;
				$kas->tgl_kas = $request->tgl_retur; 
				$kas->top = $request->top;
				$kas->tagihan = $netto;
				$kas->sisa_tagihan = $sisatagihan;
				$kas->id_transaksi = $request->id_retur;
				$kas->id_supplier = $request->id_supplier;
				$kas->id 		= 1;
				$kas->id_akun = $status_akun[0]->id_akun;
				$kas->jumlah_bayar = $bayarnya;
				$kas->keterangan = "Retur Pembelian";
				$kas->jenis_transaksi = "Retur Pembelian";
				$kas->status_akun = $status_akun[0]->status_akun;
				$kas->save();

				$piutang = new Piutang;
				$piutang->tgl_jatuh_tempo = $request->jatuhtempo;
				$piutang->tgl_piutang = $request->tgl_retur; 
				$piutang->top = $request->top;
				$piutang->tagihan = $netto;
				$piutang->sisa_tagihan = $sisatagihan;
				$piutang->id_supplier = $request->id_supplier;
				$piutang->id_transaksi = $request->id_retur;
				$piutang->id 		= 1;
				$piutang->id_akun = $status_akun[0]->id_akun;
				$piutang->jumlah_bayar = $bayarnya;
				$piutang->jenis_transaksi = "Retur Pembelian";
				$piutang->status_akun = $status_akun[0]->status_akun;	
				$piutang->save();			
			}
			if ($update) {
				$request->session()->flash('alert-info', 'Retur Pembelian Berhasil Dilakukan!');
			}else{
				$request->session()->flash('alert-warning', 'Retur Pembelian Gagal Dimasukkan!');
			}	
		}
		return redirect('FARMASI/masterReturPembelian');
	}
}
