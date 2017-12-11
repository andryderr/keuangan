<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pembelian;
use App\DetailPembelian;
use App\DetailPembelianTmp;
use App\Barang;
use App\Supplier;
use App\Gudang;
use App\SubGrupObat;
use App\Batch;
use App\MutasiBarang;
use App\KasKeluar;
use App\SettingTransaksi;
use App\Akun;
use App\Hutang;
use Auth;

use DB;

class PembelianController extends Controller
{

    use PostingController;
    public function dataBahanBaku()
    {
        $rt = Route::getFacadeRoot()->current()->uri();
        $rt1 = explode('/', $rt)[0];
        if ($rt1 == 'GIZI') {
            $supplier = Supplier::where('dept', '=', 'Bahan Baku')->get();
            $status = 0;
            $master = Pembelian::join('supplier', 'pembelian_barang.id_supplier', '=', 'supplier.id_supplier')->where('supplier.dept', '=', 'Bahan Baku')->get();
            return view('gizi/master_PembelianBahanBaku', compact('supplier','status', 'master'));
        } elseif ($rt1 == 'FARMASI') {
            $supplier = Supplier::where('dept', '=', 'Farmasi')->get();
            $status = 0;
            $master = Pembelian::join('supplier', 'pembelian_barang.id_supplier', '=', 'supplier.id_supplier')->where('supplier.dept', '=', 'Farmasi')->get();
            return view('farmasi/master_pembelianStokObat', compact('supplier','status', 'master'));
        }
    }

    public function dataBahanBakuSupplier($id){
        $rt =  Route::getFacadeRoot()->current()->uri();
        $rt1 = explode('/', $rt)[0];
        if ($rt1 == 'GIZI') {
            $data = Supplier::where('id_supplier','=',$id)->get();
            $status = 1;
            $master = Pembelian::where('id_supplier', '=', $id)->get();
            return view('gizi/master_PembelianBahanBaku', compact('data','status', 'master'));
        } elseif ($rt1 == 'FARMASI') {
            $data = Supplier::where('id_supplier','=',$id)->get();
            $status = 1;
            $master = Pembelian::where('id_supplier', '=', $id)->get();
            return view('farmasi/master_pembelianStokObat', compact('data','status', 'master'));
        }
    }

    public function pembelianBahanBaku($id, Request $request){
        $rt =  Route::getFacadeRoot()->current()->uri();
        $rt1 = explode('/', $rt)[0];
        $data = Pembelian::where('id_pembelian_barang','=',$id)->get();
        $detailPembelian = DetailPembelianTmp::where('id_pembelian_barang', '=', $id)->orderBy('id_barang')->get();
        $j_kecil = DetailPembelianTmp::select(DB::raw("id_barang as id_bar, harga, sum(jumlah_kecil) as jumlah"))->where('id_pembelian_barang', '=', $id)->groupBy('id_barang')->get();
        $dataBahanBaku = Barang::where('kat_barang', '=', 'Bahan Baku')->get();
        $dataBahanBaku1 = Barang::whereIn('barang.kat_barang', ['Obat', 'Alat Medis', 'Psikotropika', 'Narkotika', 'Daftar G'])->get();
        $dataGudang = Gudang::All();
        $SubGrupObat = SubGrupObat::All();
        if ($rt1 == 'GIZI') {
            if (empty($data[0]->total)) {
                // print_r(compact('data', 'detailPembelian', 'dataBahanBaku', 'dataBahanBaku1', 'dataGudang', 'j_kecil'));
                return view('gizi/pembelianBahanBaku',compact('data', 'detailPembelian', 'dataBahanBaku', 'dataGudang', 'j_kecil'));
            } else {
                $request->session()->flash('alert-info', 'Pembelian Telah Selesai!');
                return back();
            }
        } elseif ($rt1 == 'FARMASI') {
            if (empty($data[0]->total)) {
                return view('farmasi/pembelianStokObat',compact('data', 'detailPembelian', 'dataBahanBaku', 'dataBahanBaku1', 'dataGudang', 'j_kecil', 'SubGrupObat'));
            } else {
                $request->session()->flash('alert-info', 'Pembelian Telah Selesai!');
                return back();
            }
        }
    }

    public function tambahMaster(Request $request)
    {
        $rt1 = Auth::user()->poli->prefix;
        $data = new Pembelian;
        $data->tanggal_pembelian = $request->tgl_pembelian;
        $data->id_supplier = $request->id_sup1;
        $data->no_faktur = $request->no_faktur1;
        $data->tgl_faktur = $request->tanggal_faktur;
        $data->id = Auth::user()->id;
        try {
            $data->save();
            $request->session()->flash('alert-info', 'Data Berhasil Dimasukkan!');
        } catch (Exception $e) {
            $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
        }
        if ($rt1 == 'GIZI') {
            return redirect("GIZI/dataBahanBaku/".$data->id);
        } elseif ($rt1 == 'FARMASI') {
            return redirect("FARMASI/BeliStok/".$data->id);
        }
    }

    public function hapusMaster(Request $request, $id)
    {
        $hapus = Pembelian::where('id_pembelian_barang', '=', $id)->delete();
        if ($hapus) {
            $request->session()->flash('alert-info', 'Data Berhasil Dihapus!');
        }else{
            $request->session()->flash('alert-warning', 'Data Gagal Dihapus!');
        }
        return back();
    }   

    public function updateMasterPembelian(Request $request)
    {
        $rt1 = Auth::user()->poli->prefix;
        $data = SettingTransaksi::where('jenis_transaksi', '=', 'Pembelian')->get();
        $status_akun = Akun::where('id_akun', '=', $data[0]->id_akun)->get();
        date_default_timezone_set("Asia/Jakarta");
        $jumlah_bayar = str_replace(".", "", $request->jumlah_bayar_master);
        $netto = $request->netto_master;
        $pembelian = Pembelian::where('id_pembelian_barang','=', $request->id_pembelian_barang_master)->get();
        $nama_transaksi = "Pembelian";
        if ($request->jenis_bayar_master == 'Tunai') {
            $update = Pembelian::where('id_pembelian_barang','=', $request->id_pembelian_barang_master)->update([
                'kat_barang'    => $request->kategori_barang_master,
                'total'         => $request->total_master,
                'diskon'        => $request->diskon_master,
                'netto'         => $request->netto_master,
                'jenis_bayar'   => $request->jenis_bayar_master,
                'jumlah_bayar'  => ($jumlah_bayar - ($jumlah_bayar - $netto)),
                'id_gudang'     => $request->id_gudang_master, 
                'ppn'           => $request->ppn_master,
                'ppn_rupiah'    => $request->ppnrp_master]);
            for ($i=0; $i < count($request->id_bar); $i++) { 
                $update1 = MutasiBarang::where('id_gudang', '=', $request->id_gudang_master)->where('id_barang', '=', $request->id_bar[$i])->increment('qty_pembelian', $request->j_kecil[$i]);
            }

            //INI YANG PERLU DITAMBAH
            $sisa = ($jumlah_bayar - ($jumlah_bayar - $netto)) - $netto;
            $update2 = KasKeluar::insert([
                'id_transaksi'  => $request->id_pembelian_barang_master,
                'tgl_kas'       => date('Y-m-d H:i:s'),
                'id'            => Auth::user()->id,
                'id_akun'       => $status_akun[0]->id_akun,
                'id_supplier'   => $pembelian[0]->id_supplier,
                'tagihan'       => $request->netto_master,
                'jumlah_bayar'  => ($jumlah_bayar - ($jumlah_bayar - $netto)),
                'sisa_tagihan'  => $sisa,
                'keterangan'    => $data[0]->jenis_transaksi,
                'jenis_transaksi'=> $data[0]->jenis_transaksi,
                'status_akun'   => $status_akun[0]->status_akun,
            ]);

            $this->posting($request, $request->id_pembelian_barang_master, $nama_transaksi, $pembelian[0]->tanggal_pembelian, "pembelian tunai", ($jumlah_bayar - ($jumlah_bayar - $netto)), 0, $request->diskon_master, $request->ppnrp_master);

        } else {
            $update = Pembelian::where('id_pembelian_barang','=', $request->id_pembelian_barang_master)->update([
                'kat_barang'    => $request->kategori_barang_master,
                'total'         => $request->total_master,
                'diskon'        => $request->diskon_master,
                'netto'         => $request->netto_master,
                'jenis_bayar'   => $request->jenis_bayar_master,
                'top'           => $request->top_master,
                'uang_muka'     => $jumlah_bayar,
                'id_gudang'     => $request->id_gudang_master, 
                'ppn'           => $request->ppn_master,
                'ppn_rupiah'    => $request->ppnrp_master,
            ]);
            for ($i=0; $i < count($request->id_bar); $i++) { 
                $update1 = MutasiBarang::where('id_gudang', '=', $request->id_gudang_master)->where('id_barang', '=', $request->id_bar[$i])->increment('qty_pembelian', $request->j_kecil[$i]);
            }

            //INI YANG PERLU DITAMBAH
            $sisa = ($netto - $jumlah_bayar);
            $update2 = KasKeluar::insert([
                'id_transaksi'  => $request->id_pembelian_barang_master,
                'tgl_kas'       => $pembelian[0]->tanggal_pembelian,
                'tgl_jatuh_tempo'=> $request->tanggal_jatuhtempo,
                'id'            => Auth::user()->id,
                'id_akun'       => $status_akun[0]->id_akun,
                'id_supplier'   => $pembelian[0]->id_supplier,
                'tagihan'       => $netto,
                'jumlah_bayar'  => $jumlah_bayar,
                'sisa_tagihan'  => $sisa,
                'keterangan'    => $data[0]->jenis_transaksi,
                'jenis_transaksi'=> $data[0]->jenis_transaksi,
                'status_akun'   => $status_akun[0]->status_akun,
            ]);

            $hutang = new Hutang;
            $hutang->tgl_jatuh_tempo = $request->tanggal_jatuhtempo;
            $hutang->tgl_hutang = $pembelian[0]->tanggal_pembelian; 
            $hutang->top = $request->top_master;
            $hutang->tagihan = $netto;
            $hutang->sisa_tagihan = $sisa;
            $hutang->id_supplier = $pembelian[0]->id_supplier;
            $hutang->id_transaksi = $request->id_pembelian_barang_master;
            $hutang->id        = Auth::user()->id;
            $hutang->id_akun = $status_akun[0]->id_akun;
            $hutang->jumlah_bayar = $jumlah_bayar;
            $hutang->jenis_transaksi = $data[0]->jenis_transaksi;
            $hutang->status_akun = $status_akun[0]->status_akun;   
            $hutang->save();

            $this->posting($request, $request->id_pembelian_barang_master, $nama_transaksi, $pembelian[0]->tanggal_pembelian, "pembelian kredit", $jumlah_bayar, $sisa, $request->diskon_master, $request->ppnrp_master );
        }
        if ($update) {
            $request->session()->flash('alert-info', 'Pembelian Berhasil Dilakukan!');
        }else{
            $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
        }
        return redirect(Auth::user()->poli->prefix.'/notaPembelian/'.$pembelian[0]->id_pembelian_barang);
    }

    public function tambahBeli(Request $request)
    {   
        $rt =  Route::getFacadeRoot()->current()->uri();
        $rt1 = explode('/', $rt)[0];
        if ($rt1 == 'FARMASI') {
            $data1 = Batch::insert([
                'id_batch'              => $request->id_batch,
                'id_barang'             => $request->id_barang_pembelian,
                'jumlah_hari'           => $request->jumlah_hari,
                'qty'                   => $request->jumlah_kecil,
                'tgl_kadaluarsa'        => $request->tanggal_kadaluarsa,
            ]);
        }elseif ($rt1 == 'GIZI') {

        }
        $data = DetailPembelianTmp::insert([
            'id_pembelian_barang'   => $request->id_pembelian,
            'id_barang'             => $request->id_barang_pembelian,
            'satuan'                => $request->satuan_pembelian,
            'jumlah'                => $request->jumlah_pembelian,
            'jumlah_kecil'          => $request->jumlah_kecil,
            'harga'                 => $request->harga_pembelian,
            'diskon_rp'             => $request->diskonrp_pembelian,
            'diskon_rp1'            => $request->diskon1_pembelian,
            'diskon_rp2'            => $request->diskon2_pembelian,
            'sub_total'             => $request->subtotal_pembelian,
            'id_batch'              => $request->id_batch,
        ]);
        if ($data) {
            $request->session()->flash('alert-info', 'Pembelian Berhasil Dilakukan!');
        }else{
            $request->session()->flash('alert-warning', 'Data Gagal Dimasukkan!');
        }
        return back();
    }

    public function hapusDetailPembelian($id)
    {
        $data = DetailPembelianTmp::where('id_detail_pembelian', '=', $id);
        $data->delete();
        return back();
    }

    //It's New Ndry (28-07-2017)

    public function rekapPembelian()
    {
        $data = Pembelian::where('total', '!=', 'NULL')->get();
        $totbeli = MutasiBarang::select(DB::raw("sum(qty_pembelian) as total_beli"))->get();
        $totuangbeli = Pembelian::select(DB::raw("sum(netto) as total_uang_beli"))->get();
        $transaksi = Pembelian::select(DB::raw("count(id_pembelian_barang) as total_transaksi"))->get();

        return view('farmasi/rekapPembelian', compact('data','totbeli','totuangbeli','transaksi'));
    }

    public function detailRekapPembelian($id)
    {
        $data = Pembelian::where('id_pembelian_barang', '=', $id)->get();

        return view('farmasi/detail_rekapPembelian', compact('data'));
    }

    public function notaPembelian($poli,$id)
    {
        $data = Pembelian::where('id_pembelian_barang', '=', $id)->get();
        $dataDetail = DetailPembelian::where('id_pembelian_barang', '=', $data[0]->id_pembelian_barang)->get();
        return view('cetak/cetak_fakturpembelian', compact('data', 'dataDetail'));
    }
    public function rekapPembelianPerItem(){
        $data = DetailPembelian::select(DB::raw("*, sum(jumlah_kecil) as totalqty"))->groupBy('id_barang','id_batch')->get();
        return view('farmasi/detail_rekapPembelianPerItem', compact('data'));
    }
}
