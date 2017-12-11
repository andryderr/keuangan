<?php
Route::get('refresh','DashboardController@refresh');
//rancu
Route::get('GIZI/validasiSajian',function () {
	return view('gizi/validasiDistribusi');
});
Route::get('GIZI/riwayatDistribusi',function () {
	return view('gizi/logDistribusi');
});
Route::get('GIZI/riwayatPembelian',function () {
	return view('gizi/logPembBahanBaku');
});
Route::get('KASIR/LaporanKasHarian',function () {
	return view('kasir/laporan_kasHarian');
});
Route::get('FARMASI/SubGrupObat',function () {
	return view('farmasi/sub_grupObat');
});
Route::get('FARMASI/resepObat',function () {
	return view('sfynf/farmasi/resepObat');
});

Route::get('FARMASI/DetailBarangGudang',function () {
	return view('farmasi/detailBarangGudang');
});
Route::get('CETAK/cetakAntrian/{id}', 'PendaftaranController@cetakAntrian');
Route::get('CETAK/cetakGelang/{id}', 'PendaftaranController@cetakGelang');
Route::get('CETAK/notaPenjualan', function () {
	return view('cetak/cetak_fakturpenjualan');
});
Route::get('CETAK/notaPembelian', function () {
	return view('cetak/cetak_fakturpembelian');
});
Route::get('CETAK/Kwitansi', function () {
	return view('CETAK/cetak_kwitansi');
});
Route::get('CETAK/copyResep', function () {
	return view('CETAK/copy_resep');
});


Route::get('{poli}/notaPembelian/{id}', 'PembelianController@notaPembelian');

Route::get('{poli}/notaPenjualan/{id}', 'PenjualanController@notaPenjualan');

//routes
Route::auth();
Route::get('/',function () {
	if (Auth::check()) {
		return redirect('check');
	} else {
		return view('auth.login');
	}
});
Route::get('/check',function(){
	if (Auth::user()) {
		if (Auth::user()->status == 'Active') {
			$url = Auth::user()->poli->prefix."/dashboard";
			return redirect($url);
		} else {
			return redirect('logout');
		}
	} else {
		return back();
	}
});
Route::group(['middleware' => ['MyAuth']],function () {
	Route::get('{poli}/',function(){
		return redirect("check");
	});

	//KEUANGAN
	Route::get('KEUANGAN/dashboard', 'KeuanganController@index');
	Route::get('KEUANGAN/posting', 'KeuanganController@indexPosting');
	Route::get('KEUANGAN/jurnalUmum', 'KeuanganController@jurnalUmum');
	Route::post('KEUANGAN/createMasterJurnal', 'KeuanganController@createMasterJurnal');
	Route::get('KEUANGAN/detailJurnal/{id}', 'KeuanganController@detailJurnal');

	Route::get('KEUANGAN/tabel_posting','KeuanganController@tabel_posting');

	//Dashboard
	Route::get('{poli}/pasien','PasienController@pendafPasien');
	// Route::get('{poli}/dataPasien','PasienController@dataPasien');
	Route::post('PENDAF/Pasien/Update','PasienController@update');
	// Route::get('PENDAF/dashboard','PendaftaranController@dataPendaftaran');
	Route::post('PENDAF/pendaftaran/store','PendaftaranController@store');
	Route::post('PENDAF/pendaftaran/update','PendaftaranController@update');
	Route::get('PERSONALIA/Aktivitas/Dokter','PersonaliaController@index3');
	Route::get('PERSONALIA/Aktivitas/Petugas','PersonaliaController@index4');
	Route::get('PERSONALIA/dashboard','PersonaliaController@index');
	Route::get('PERSONALIA/Data/Dokter','PersonaliaController@index1');
	Route::get('PERSONALIA/Data/Petugas','PersonaliaController@index2');
	Route::get('PERSONALIA/Dokter/Hapus/{id}','PersonaliaController@hapusDokter');
	Route::post('PERSONALIA/Dokter/Tambah','PersonaliaController@tambahDokter');
	Route::post('PERSONALIA/Dokter/Ubah','PersonaliaController@ubahDokter');
	Route::get('PERSONALIA/Petugas/Hapus/{id}','PersonaliaController@hapusPetugas');
	Route::post('PERSONALIA/Petugas/Tambah','PersonaliaController@tambahPetugas');
	Route::post('PERSONALIA/Petugas/Ubah','PersonaliaController@ubahPetugas');
	Route::get('PERSONALIA/Poli','PoliController@index');
	Route::get('PERSONALIA/Poli/Dokter/{id}','PoliController@dokter');
	Route::get('PERSONALIA/Poli/Dokter/Hapus/{id}','PoliController@deleteDokter');
	Route::post('PERSONALIA/Poli/Dokter/Tambah','PoliController@tambahDokter');
	Route::get('PERSONALIA/Poli/Petugas/{id}','PoliController@petugas');
	Route::post('PERSONALIA/Poli/Petugas/Tambah','PoliController@tambahPetugas');
	Route::get('PERSONALIA/Poli/Petugas/Hapus/{id}','PoliController@deletePetugas');
	Route::get('PERSONALIA/Poli/detail/{id}','PoliController@detail');
	Route::get('PERSONALIA/Poli/hapus/{id}','PoliController@destroy');
	Route::post('PERSONALIA/Poli/tambah','PoliController@store');
	Route::post('PERSONALIA/Poli/update','PoliController@update');
	Route::get('PERSONALIA/User/active/{id}','UserController@active');
	Route::get('PERSONALIA/User/hapus/{id}','UserController@hapus');
	Route::post('PERSONALIA/User/Register','UserController@register');
	Route::post('PERSONALIA/User/update','UserController@update');
	Route::get('RWINAP/dataKelas','RawatInap\DataKamar@dataKelas');
	Route::get('RWINAP/dataKelas/dataKamar/{id}','RawatInap\DataKamar@dataRuang');
	Route::get('RWINAP/dataKelas/hapusKelas/{id}','RawatInap\DataKamar@hapusKelas');
	Route::get('RWINAP/dataPasien/diagnosaPasien/{id}','RawatInap\DetailPasienRinap@diagnosaPasien');
	Route::get('RWINAP/dataPasien/utilitasKamar/{id}','RawatInap\DetailPasienRinap@pilihKamar');
	Route::get('RWINAP/dataRuang/hapusRuang/{id}','RawatInap\DataKamar@hapusRuang');
	Route::get('RWINAP/dashboard','PendaftaranController@rinapDashboard');
	Route::post('RWINAP/Pasien/Gizi/Tambah','RawatInap\RekomendasiController@tambahRekomendasi');
	Route::get('RWINAP/Pasien/Gizi/Hapus/{id}','RawatInap\RekomendasiController@hapusRekomendasi');
	Route::post('RWINAP/Pasien/Kamar','RawatInap\DetailPasienRinap@pasienDirawat');
	Route::get('RWINAP/pendaftaran','PendaftaranController@create1');
	Route::post('RWINAP/pasienDirawat','RawatInap\DetailPasienRinap@pasienDirawat');
	Route::post('RWINAP/pindahKamar','RawatInap\DetailPasienRinap@pindahKamar');
	Route::get('RWINAP/jsonPindahKamar','RawatInap\DetailPasienRinap@jsonPindahKamar');
	Route::get('RWINAP/readDataKamar/{id}','RawatInap\DataKamar@viewDataKamar');
	Route::post('RWINAP/tambahKelas','RawatInap\DataKamar@tambahKelas');
	Route::post('RWINAP/tambahRuang','RawatInap\DataKamar@tambahRuang');
	Route::post('RWINAP/tambahKamar','RawatInap\DataKamar@tambahKamar');
	Route::post('RWINAP/tambahRujukan','RawatInap\DetailPasienRinap@tambahRujukan');
	Route::post('RWINAP/ubahKelas','RawatInap\DataKamar@ubahKelas');
	Route::post('RWINAP/ubahRuang','RawatInap\DataKamar@ubahRuang');
	Route::get('RWINAP/viewDataKelas/','RawatInap\DataKamar@viewDataKelas');
	Route::get('RWINAP/viewDataRuang','RawatInap\DataKamar@viewDataRuang');
	Route::post('GIZI/BahanBaku/Pembelian/Tambah','BarangController@pembelianBahanBakuMaster');
	Route::get('GIZI/dashboard','RawatInap\RekomendasiController@dataRekomendasi');
	Route::get('GIZI/dataSupplier','Barang\SupplierController@index');
	Route::get('GIZI/dataBahanBaku','BarangController@dataBahanBaku');
	Route::get('GIZI/dataBahanBaku/{id}','PembelianController@pembelianBahanBaku');//
	Route::get('GIZI/dataBahanBaku/{id}/{id2}','BarangController@dataBahanBakuSupplierDetail');
	Route::get('GIZI/dataGudang','GudangController@index');
	Route::post('GIZI/editBarang','BarangController@editBarang');
	Route::post('GIZI/editJenisSajian','JenisBarangController@editJenisSajian');
	Route::get('GIZI/hapusJenisSajian/{id}','JenisBarangController@hapusJenisSajian');
	Route::get('GIZI/hapusBarang/{id}','BarangController@hapusBarang');//
	Route::get('GIZI/hapusDetailPembelian/{id}','PembelianController@hapusDetailPembelian');//
	Route::get('GIZI/hapusSajian/{id}','BarangController@hapusBarang');
	Route::get('GIZI/hapusMaster/{id}','PembelianController@hapusMaster');//
	Route::get('GIZI/jenisSajian','JenisBarangController@index');//
	Route::get('GIZI/jenisSajian/Sajian/{id}','BarangController@index');
	Route::get('GIZI/jenisSajian/dataSajian/pengolahanSajian/{id}','PengolahanController@dataBarang');
	Route::get('GIZI/jenisSajian/dataSajian/pengolahanSajian/hapusBahanPengolahan/{id}','PengolahanController@hapusBahan');
	Route::post('GIZI/jenisSajian/dataSajian/pengolahanSajian/tambahDataPengolahan','PengolahanController@inputDetailPengolahan');
	Route::post('GIZI/jenisSajian/dataSajian/pengolahanSajian/simpanTotal','PengolahanController@inputTotal');
	Route::get('GIZI/masterPembelian','PembelianController@dataBahanBaku');
	Route::get('GIZI/masterPembelian/{id}','PembelianController@dataBahanBakuSupplier');
	Route::get('GIZI/pembelian','BarangController@pembelian');
	Route::get('GIZI/rekomSajian','RawatInap\RekomendasiController@dataRekomendasi');
	Route::post('GIZI/Rekomendasi/Sajian/Tambah','RawatInap\RekomendasiController@tambahRekomendasi');
	Route::get('GIZI/stokBahanBaku','BarangController@stokBahanBaku');
	Route::post('GIZI/tambahBeli','PembelianController@tambahBeli');
	Route::post('GIZI/tambahBahanBaku','BarangController@tambahBarang');
	Route::post('GIZI/tambahGudang','GudangController@tambahGudang');
	Route::post('GIZI/tambahJenisSajian','JenisBarangController@tambahJenisSajian');
	Route::post('GIZI/tambahMaster','PembelianController@tambahMaster');
	Route::post('GIZI/tambahMasterPengolahan','PengolahanController@inputPengolahan');
	Route::post('GIZI/tambahSajian','BarangController@tambahBarang');
	Route::post('GIZI/updateMasterPembelian','PembelianController@updateMasterPembelian');
	Route::get('KASIR/Akun','AkunController@dataAkun');
	Route::get('KASIR/BankMasukKeluar','BankController@index');
	Route::post('KASIR/bayarPiutang','PiutangController@bayarPiutang');
	Route::post('KASIR/bayarHutang','HutangController@bayarHutang');
	Route::get('KASIR/dashboard','KasController@dataPembayaran');
	Route::get('KASIR/detailAkun/{id}','AkunController@detailAkun');
	Route::post('KASIR/tambahDetailAkun', 'AkunController@tambahDetailAkun');
	Route::get('KASIR/DetailPiutang','PiutangController@detailPiutang');
	Route::get('KASIR/DetailHutang','HutangController@detailHutang');
	Route::post('KASIR/editSetting','SettingController@editSetting');
	Route::get('KASIR/hapusAkun/{id}','AkunController@hapusAkun');
	Route::get('KASIR/Hutang','HutangController@dataHutang');
	Route::get('KASIR/KasMasuk','KasController@dataKasMasuk');
	Route::get('KASIR/LaporanKasHarian', 'KasController@laporanKasHarian');
	Route::get('KASIR/filterLaporanHarian', 'KasController@filterLaporanHarian');
	Route::get('KASIR/LaporanBankHarian', 'BankController@laporanBankHarian');
	Route::get('KASIR/filterLaporanBankHarian', 'BankController@filterLaporanHarian');
	Route::get('KASIR/Piutang','PiutangController@dataPiutang');
	Route::get('KASIR/PembayaranFarmasi', 'KasController@pembayaranFarmasi');
	Route::get('KASIR/setting','SettingController@index');
	Route::post('KASIR/simpanPembayaran','KasController@simpanPembayaran');
	Route::post('KASIR/tambahBankKeluar','BankController@tambahBankKeluar');
	Route::post('KASIR/tambahBankMasuk','BankController@tambahBankMasuk');
	Route::post('KASIR/tambahKasMasuk','KasController@tambahKasMasuk');
	Route::post('KASIR/tambahKasKeluar','KasController@tambahKasKeluar');
	Route::post('KASIR/tambahPembayaran','KasController@tambahPembayaran');
	Route::post('KASIR/tambahAkun','AkunController@tambahAkun');
	Route::post('KASIR/ubahAkun','AkunController@editAkun');
	Route::get('KASIR/viewDetailHutang','HutangController@viewDetailHutang');
	Route::get('KASIR/viewDetailPiutang','PiutangController@viewDetailPiutang');
	Route::get('KASIR/cetakKwitansi/{id}','PendaftaranController@cetakKwitansi');
	// KASIR/HistoriPembayaran
	Route::get('KASIR/HistoriPembayaran','KasController@dataHistory');
	
	//=========================================================================FARMASI
	Route::get('FARMASI/BeliStok/{id}','PembelianController@pembelianBahanBaku');
	Route::get('FARMASI/dashboard','ResepController@index');
	Route::get('FARMASI/dataGudang','GudangController@index');
	Route::get('FARMASI/detailLaporanObatKhusus/{id}','LaporanObatKhususController@detailLaporanObatKhusus');
	Route::get('FARMASI/detailRekapPembelian/{id}','PembelianController@detailRekapPembelian');
	Route::get('FARMASI/detailRekapPenjualan/{id}','PenjualanController@detailRekapPenjualan');
	Route::get('FARMASI/detailStokAwal/{id}','StokAwalController@dataDetailStokAwal');
	Route::get('FARMASI/dataObat','BarangController@dataObat');
	Route::post('FARMASI/editdataObat','BarangController@editObat');
	Route::post('FARMASI/editObatAlkes','BarangController@editObatAlkes');
	Route::post('FARMASI/editGrup','GrupObatController@editGrup');
	Route::post('FARMASI/editGudang','GudangController@editGudang');
	Route::get('FARMASI/GrupObat','GrupObatController@index');
	Route::get('FARMASI/hapusDetailPemindahan/{id}','PemindahanBarangController@hapusDetailPemindahan');
	Route::get('FARMASI/hapusDetailPenjualan/{id}', 'PenjualanController@hapusDetailPenjualan');
	Route::get('FARMASI/hapusDetailRetur/{id}','ReturPembelianController@hapusDetailReturPembelian');
	Route::get('FARMASI/hapusDetailReturPenjualan/{id}','ReturPenjualanController@hapusDetailReturPenjualan');
	Route::get('FARMASI/hapusDetailRevisi/{id}','RevisiController@hapusDetailRevisi');
	Route::get('FARMASI/hapusDetailStokAwal/{id}','StokAwalController@hapusDetailStokAwal');
	Route::get('FARMASI/hapusGrup/{id}','GrupObatController@hapusGrup');
	Route::get('FARMASI/hapusMaster/{id}', 'PembelianController@hapusMaster');
	Route::get('FARMASI/hapusMasterPemindahan/{id}','PemindahanBarangController@hapusMasterPemindahan');
	Route::get('FARMASI/hapusMasterPenjualan/{id}','PenjualanController@hapusMasterPenjualan');
	Route::get('FARMASI/hapusMasterReturPembelian/{id}','ReturPembelianController@hapusMasterReturPembelian');
	Route::get('FARMASI/hapusMasterReturPenjualan/{id}','ReturPenjualanController@hapusMasterReturPenjualan');
	Route::get('FARMASI/hapusMasterStokAwal/{id}','StokAwalController@hapusMasterStokAwal');
	Route::get('FARMASI/hapusRevisiStok/{id}','RevisiController@hapusMaster');
	Route::get('FARMASI/hapusSubGrup/{id}','SubGrupController@hapusSubGrup');
	Route::get('FARMASI/LaporanKadaluarsa','LaporanStokController@laporanKadaluarsa');
	Route::get('FARMASI/LaporanMutasiStokBarang','LaporanStokController@laporanMutasiStok');
	Route::get('FARMASI/LaporanObatKhusus','LaporanObatKhususController@getDataPenjualanPsikotropika');
	Route::get('FARMASI/LaporanStokBarang','LaporanStokController@laporanStokBarang');
	Route::get('FARMASI/laporanStokMinimal', 'LaporanStokController@laporanStokMinimal');
	Route::get('FARMASI/masterPembelian', 'PembelianController@dataBahanBaku');
	Route::get('FARMASI/masterPembelian/{id}', 'PembelianController@dataBahanBakuSupplier');
	Route::get('FARMASI/masterPemindahanBarang','PemindahanBarangController@getDataMasterPemindahan');
	Route::get('FARMASI/masterReturPembelian','ReturPembelianController@getMReturPembelian');
	Route::get('FARMASI/masterReturPenjualan','ReturPenjualanController@getMasterReturPenjualan');
	Route::get('FARMASI/masterStokAwal','StokAwalController@masterStokAwal');
	Route::get('FARMASI/masterStokAwal/{id}','StokAwalController@dataMasterStokAwal');
	Route::get('FARMASI/PemindahanBarang','PemindahanBarangController@dataDetailPemindahan');
	Route::get('FARMASI/PemindahanBarang/{id}','PemindahanBarangController@dataMasterPemindahan');
	Route::get('FARMASI/penjualanFarmasi/{id}','ResepController@dataPenjualan1');
	Route::get('FARMASI/penjualanObat','PenjualanController@dataPenjualan');
	Route::get('FARMASI/penjualanObat/{id}','PenjualanController@dataPenjualan1');
	Route::get('FARMASI/resepObat/{id}', 'ResepController@dataResep');
	Route::get('FARMASI/returObat/{id}','ReturPembelianController@getMasterReturPembelian');
	Route::post('FARMASI/returObat/tambahDetailReturPen','ReturPenjualanController@tambahDetailReturPenjualan');
	Route::post('FARMASI/returObat/tambah','ReturPembelianController@tambahMasterReturPembelian');
	Route::post('FARMASI/returObat/tambahDetailRetur','ReturPembelianController@tambahDetailReturPembelian');
	Route::post('FARMASI/returObat/tambahMP','ReturPenjualanController@tambahMasterReturPenjualan');
	Route::post('FARMASI/returObat/updateMasterReturPembelian','ReturPembelianController@updateMasterPembelian');
	Route::post('FARMASI/returObat/updateMasterReturPenjualan','ReturPenjualanController@updateMasterPenjualan');
	Route::get('FARMASI/rekapPembelian','PembelianController@rekapPembelian');
	Route::get('FARMASI/detailRekapPembelian/{id}', 'PembelianController@detailRekapPembelian');
	Route::get('FARMASI/returPenjualan/detailReturPenjualan/{id}','ReturPenjualanController@getAllReturPenjualan');
	Route::get('FARMASI/rekapPenjualan','PenjualanController@rekapPenjualan');
	Route::get('FARMASI/RevisiStok','RevisiController@master');
	Route::post('FARMASI/selesaiPemindahan','PemindahanBarangController@selesaiPemindahan');
	Route::post('FARMASI/simpanMasterPenjualan','ResepController@simpanMasterPenjualan');
	Route::post('FARMASI/subGrup/tambahBahanBaku','BarangController@tambahBarang');
	Route::post('FARMASI/SubGrupObat/editSubGrupObat','SubGrupController@editSubGrup');
	Route::post('FARMASI/SubGrupObat/tambahSubGrupObat','SubGrupController@tambahSubGrup');
	Route::post('FARMASI/selesaiStokAwal','StokAwalController@selesaiStokAwal');
	Route::post('FARMASI/tambahBeli','PembelianController@tambahBeli');
	Route::post('FARMASI/tambahBahanBaku','BarangController@tambahBarang');
	Route::post('FARMASI/tambahDetailRevisi','RevisiController@tambahDetailRevisi');
	Route::post('FARMASI/tambahGrup','GrupObatController@tambahGrup');
	Route::post('FARMASI/tambahGudang','GudangController@tambahGudang');
	Route::post('FARMASI/tambahItemPemindahan','PemindahanBarangController@tambahItemDetail');
	Route::post('FARMASI/tambahItemStokAwal','StokAwalController@tambahItemStokAwal');
	Route::post('FARMASI/tambahMaster', 'PembelianController@tambahMaster');
	Route::post('FARMASI/tambahMasterPenjualan','PenjualanController@tambahMasterPenjualan');
	Route::post('FARMASI/tambahMasterRevisi','RevisiController@tambahMasterRevisi');
	Route::post('FARMASI/tambahPemindahan','PemindahanBarangController@tambahMasterPemindahan');
	Route::post('FARMASI/tambahPenjualan','PenjualanController@tambahPenjualan');
	Route::get('FARMASI/tambahRevisiStok','RevisiController@index');
	Route::post('FARMASI/tambahStokAwal','StokAwalController@tambahMasterStokAwal');
	Route::post('FARMASI/updateMasterPenjualan','PenjualanController@updateMasterPenjualan');
	Route::post('FARMASI/updateMasterPenjualan1', 'ResepController@updateMasterPenjualan');
	Route::post('FARMASI/updateMasterRevisi','RevisiController@updateMasterRevisi');
	Route::get('LOGISTIK/GrupLogistik', 'GrupLogistikController@index');
	Route::post('LOGISTIK/tambahGrupLogistik', 'GrupLogistikController@tambahGrupLogistik');
	Route::post('LOGISTIK/editGrupLogistik', 'GrupLogistikController@editGrupLogistik');
	Route::get('LOGISTIK/hapusGrupLogistik/{id}', 'GrupLogistikController@hapusGrupLogistik');
	Route::get('LOGISTIK/SubGrupLogistik/{id}', 'SubGrupLogistikController@index');
	Route::post('LOGISTIK/SubGrupLogistik/tambahSubGrupLogistik', 'SubGrupLogistikController@tambahSubGrupLogistik');
	Route::post('LOGISTIK/SubGrupLogistik/editSubGrupLogistik', 'SubGrupLogistikController@editSubGrupLogistik');
	Route::get('LOGISTIK/hapusSubGrupLogistik/{id}', 'SubGrupLogistikController@hapusSubGrupLogistik');
	Route::get('LOGISTIK/hapusBarangLogistik/{id}', 'BarangController@hapusBarang');
	Route::post('LOGISTIK/tambahBahanBaku','BarangController@tambahBahanBaku');

	Route::get('{poli}/dataSupplier', 'SupplierController@index');
	Route::get('G/detailLogistik/','SubGrupLogistikController@jsonDetailSubgrupLogistik');
	Route::get('{poli}/BeliStok/{id}','PembelianController@pembelianBahanBaku');
	Route::get('{poli}/billing/toVerifikasi','PendaftaranController@toVerifikasiBilling');
	Route::post('{poli}/billing/verifikasi/','PendaftaranController@verifikasiBilling');
	Route::get('{poli}/dashboard','PendaftaranController@index');
	Route::get('{poli}/dataPasien/cetakBilling/{id}','PendaftaranController@cetakBilling');
	Route::get('{poli}/cetakBilling/{id}','PendaftaranController@cetakBilling2');
	Route::get("{poli}/dataPasien/DetailRiwayat{id}","PasienController@detailRiwayat");
	Route::get('{poli}/dataPasien/diagnosaPasien1/{id}/{id2}','PendaftaranController@diagnosa1');
	Route::get('{poli}/dataPasien/hasilPemeriksaan/{id}','Layanan\J_Pemeriksaan@hasilPemeriksaan');
	Route::post('{poli}/dataPasien/Obat/{id}','PendaftaranController@tambahObat');
	Route::get('{poli}/dataPasien/pasienDirawat','Layanan\Rujukan@dataPasienRujukan');
	Route::get('{poli}/dataPasien/pasienDirawat','PendaftaranController@igdDirawat');
	Route::post('{poli}/dataPasien/pasienDirawat/keluar','PendaftaranController@updateKeluar');
	Route::get('{poli}/dataPasien/pasienKeluar','PendaftaranController@igdKeluar');
	Route::get('{poli}/dataPasien/Pemeriksaan/{id}','Layanan\Rujukan@detailDataPasienRujukan');
	Route::get("{poli}/dataPasien/riwayat/{id}","PasienCOntroller@riwayat");
	Route::get('{poli}/dataSupplier','SupplierController@index');
	Route::get('{poli}/dataJenisPemeriksaan','Layanan\J_Pemeriksaan@index3');
	Route::get('{poli}/dataDokter','DokterController@igd');
	Route::get('{poli}/dataPetugasMedis','PetugasMedisController@igd');
	Route::get('{poli}/Data/Dokter','DokterController@igd');
	Route::get('{poli}/Data/Dokter/Delete','DokterController@igdDokterHapus');
	Route::post('{poli}/Data/Dokter/Tambah','DokterController@igdDokterTambah');
	Route::post('{poli}/Data/Dokter/Ubah','DokterController@igdDokterUbah');
	Route::get('{poli}/Data/Kelas/{id}','TindakanMedisController@kelas');
	Route::get('{poli}/Data/Kelas/{id}/{id2}','TindakanMedisController@detailHarga');
	Route::get('{poli}/Data/Petugas','PetugasMedisController@igd');
	Route::get('{poli}/Data/Petugas/Delete','PetugasMedisController@igdPetugasHapus');
	Route::post('{poli}/Data/Petugas/Tambah','PetugasMedisController@igdPetugasTambah');
	Route::post('{poli}/Data/Petugas/Ubah','PetugasMedisController@igdPetugasUbah');
	Route::get('{poli}/DetailDiagnosa/hapus/{id}','JenisDiagnosaController@hapusDetail');
	Route::post('{poli}/DetailDiagnosa/tambah/{id}','JenisDiagnosaController@tambahDetail');
	Route::get('{poli}/detail/riwayat/{id}',"PasienController@detailRiwayat");
	Route::get('{poli}/detailTindakanMedis/{id}','JenisTindakanMedisController@detailTindakanMedis');
	Route::get('{poli}/DetailTindakanMedis/Dokter/Delete/{id}','JenisTindakanMedisController@deleteDokter');
	Route::get('{poli}/DetailTindakanMedis/Petugas/Delete/{id}','JenisTindakanMedisController@deletePetugas');
	Route::post('{poli}/detailTindakanMedis/tambah/{id}','JenisTindakanMedisController@insertDP');
	Route::post('{poli}/detailTindakanMedis/tambah1/{id}','TindakanMedisController@tambahDetailTindakanMedis');

	Route::post('{poli}/detailTindakanMedis/update/{id}','JenisTindakanMedisController@updatePRS');
	Route::post('{poli}/DetailTindakanMedis/Update/Dokter/{id}','JenisTindakanMedisController@updateDokter');
	Route::post('{poli}/DetailTindakanMedis/Update/Petugas/{id}','JenisTindakanMedisController@updatePetugas');
	Route::post('{poli}/detail/tambahKelasMedis/{id}','JenisTindakanMedisController@tambahkelasMedis');
	Route::post('{poli}/editJenisPemeriksaan','Layanan\J_Pemeriksaan@editJenisPemeriksaan');
	Route::post('{poli}/editDetailJenisPemeriksaan','Layanan\J_Pemeriksaan@editDetailJenisPemeriksaan');
	Route::get('{poli}/gantiPassword','UserController@viewGantiPassword');
	Route::get('{poli}/hapusDetailJP/{id}','Layanan\J_Pemeriksaan@hapusDetailJP');
	Route::get('{poli}/hapusDetailPembelian/{id}','PembelianController@hapusDetailPembelian');
	Route::get('{poli}/hapusDetailPemeriksaan/{id}','Layanan\J_Pemeriksaan@hapusDetailPemeriksaan');
	Route::get('{poli}/hapusGudang/{id}','GudangController@hapusGudang');
	Route::get('{poli}/hapusJenisPemeriksaan/{id}','Layanan\J_Pemeriksaan@hapusJenisPemeriksaan');
	Route::get('{poli}/hapusMaster/{id}','PembelianController@hapusMaster');
	Route::get('{poli}/hapusSupplier/{id}','SupplierController@hapusSupplier');	
	Route::get('{poli}/jenisDiagnosa','JenisDiagnosaController@index');
	Route::get('{poli}/jenisDiagnosa/hapus/{id}','JenisDiagnosaController@destroy');
	Route::post('{poli}/jenisDiagnosa/tambah','JenisDiagnosaController@store');
	Route::post('{poli}/jenisDiagnosa/edit','JenisDiagnosaController@update');
	Route::get('{poli}/jenisPemeriksaan','Layanan\J_Pemeriksaan@index');
	Route::get('{poli}/jsonJenisPemeriksaan','Layanan\J_Pemeriksaan@index2');
	Route::get('{poli}/jenisTindakanMedis','JenisTindakanMedisController@index');
	Route::get('{poli}/jenisTindakanMedis/delete/{id}','JenisTindakanMedisController@destroy');
	Route::post('{poli}/jenisTindakanMedis/tambah','JenisTindakanMedisController@store');
	Route::post('{poli}/jenisTindakanMedis/update','JenisTindakanMedisController@update');
	Route::get('{poli}/masterPembelian','PembelianController@dataBahanBaku');
	Route::get('{poli}/masterPembelian/{id}','PembelianController@dataBahanBakuSupplier');
	Route::get('{poli}/masterPenjualan','PenjualanController@dataMaster');
	Route::get('{poli}/Pasien/DetailTindakanMedis/Edit/{id}','JenisTindakanMedisController@editTindakanPasien');
	Route::post('{poli}/detailTindakanMedis/edit1','TindakanMedisController@updateDetailTindakanMedis');
	Route::get('{poli}/detailTindakanMedis/delete/{id}','TindakanMedisController@deleteDetailTindakanMedis');
	Route::get('{poli}/Pasien/DetailTindakanMedis/Hapus/{id}','JenisTindakanMedisController@hapusTindakanPasien');
	Route::post('{poli}/Pasien/DetailTindakanMedis/Tambah','JenisTindakanMedisController@tambahTindakanPasien');
	Route::post('{poli}/Pasien/DetailTindakanMedis/Update/Dokter/{id}','JenisTindakanMedisController@editDokterTindakanMedis');
	Route::post('{poli}/Pasien/DetailTindakanMedis/Update/Petugas/{id}','JenisTindakanMedisController@editPetugasTindakanMedis');
	Route::post('{poli}/Pasien/DetailTindakanMedis/Update/Rs/{id}','JenisTindakanMedisController@editRsTindakanMedis');
	Route::get('{poli}/pasien/data/keluar','PendaftaranController@dataKeluar');
	Route::get('{poli}/pasien/data/dirawat','PendaftaranController@dataDirawat');
	Route::get('{poli}/pendaftaran','PendaftaranController@create');
	Route::post('{poli}/pendaftaran/store','PendaftaranController@store');
	Route::post('{poli}/Rujukan/Rujuk/{id}','PendaftaranController@rujuk');
	Route::get('{poli}/RevisiStok/{id}','RevisiController@index1');
	Route::post('{poli}/simpanCheckbox','Layanan\J_Pemeriksaan@simpanCheckbox');
	Route::post('{poli}/simpanDetailJP','Layanan\J_Pemeriksaan@simpanDetailJP');
	Route::post('{poli}/simpanHasilPemeriksaan','Layanan\J_Pemeriksaan@simpanHasilPemeriksaan');
	Route::get('{poli}/SubGrupObat/{id}','SubGrupController@index');
	Route::post('{poli}/Status/Dirawat','PendaftaranController@updateStatus');
	Route::post('{poli}/tambahBeli','PembelianController@tambahBeli');
	Route::post('{poli}/tambahJenisPemeriksaan','Layanan\J_Pemeriksaan@tambahJenisPemeriksaan');
	Route::post('{poli}/tambahMaster','PembelianController@tambahMaster');
	Route::post('{poli}/tambahSupplier','SupplierController@tambahSupplier');
	Route::post('{poli}/updateMasterPembelian','PembelianController@updateMasterPembelian');
	Route::post('{poli}/ubahSupplier','SupplierController@ubahSupplier');
	Route::post('{poli}/updatePassword','UserController@updatePassword');
	Route::post('{poli}/editGudang','GudangController@editGudang');	
	Route::get('{poli}/pendaftaran/pasienlama/{id}','PasienController@pasienLama');

	//Ini Penambahanku
	Route::get('{poli}/dataBarang','BarangController@dataBarang');	
	// penambahan yofan
	Route::get('FARMASI/detailRekapPenjualanPerItem', 'PenjualanController@rekapPenjualanPerItem');
	Route::get('FARMASI/detailRekapPembelianPerItem', 'PembelianController@rekapPembelianPerItem');
	Route::get('FARMASI/Obat/hapus/{id}','BarangController@hapusBarang');
	Route::get('RWINAP/kamar/hapus/{id}','RawatInap\DataKamar@hapusKamar');
	Route::get('FARMASI/riwayatResep','ResepController@riwayatResep');
	
	Route::get('{poli}/stokOpname', 'StokOpnameController@index');
	Route::post('{poli}/simpanMasterStokOpname', 'StokOpnameController@simpanMaster');
	Route::get('{poli}/hapusMasterStokOpname/{id}', 'StokOpnameController@hapusMaster');
	Route::get('{poli}/detailStokOpname/{id}', 'StokOpnameController@detailStokOpname');
	Route::post('{poli}/simpanDetailStokOpname', 'StokOpnameController@simpanDetail');
	Route::get('{poli}/hapusDetailStokOpname/{id}', 'StokOpnameController@hapusDetail');
	Route::post('{poli}/updateMasterStokOpname', 'StokOpnameController@updateMasterStokOpname');

	Route::get('{poli}/detailJenisPemeriksaan/{id}','Layanan\J_Pemeriksaan@detailJenisPemeriksaan');
	Route::get('{poli}/detailJenisPemeriksaan1','Layanan\J_Pemeriksaan@detailJenisPemeriksaan1');
	Route::get('{poli}/dataDetailJenisPemeriksaan/{id}','Layanan\J_Pemeriksaan@dataDetailJenisPemeriksaan');
	Route::post('{poli}/updateMasterPemeriksaan/{id}', 'Layanan\J_Pemeriksaan@updateMasterPemeriksaan');

	//fitur baru
	Route::get('KASIR/masterAkun', 'MasterAkunController@masterAkun');
	Route::post('KASIR/tambahMasterAkun','MasterAkunController@tambahMasterAkun');
	Route::post('KASIR/editMasterAkun','MasterAkunController@editMasterAkun');
	Route::get('KASIR/hapusMasterAkun/{id}','MasterAkunController@hapusMasterAkun');

	
});
Route::get('/home','HomeController@index');
Route::get('G/hapusPasien', 'HomeController@hapusPasien');
Route::get('G/detailHutang/','HutangController@jsonDetailHutang');
Route::get('G/detailPiutang/','PiutangController@jsonDetailPiutang');
Route::get('G/dataPasien','PasienController@index');
Route::get('G/dataPasienDistribusi/', 'RawatInap\RekomendasiController@dataPasienDistribusi');
Route::get('G/dataSatuan','BarangController@dataSatuan');
Route::get('G/cariCustomer','PenjualanController@cariCustomer');
Route::get('G/cariDokter','PenjualanController@cariDokter');
Route::get('G/cariPasien','PenjualanController@cariPasien');
Route::get('G/Dokter','DokterController@showAll');
Route::get('G/Dokter/show/{id}','DokterController@show');
Route::get('G/detailPiutang/','PiutangController@jsonDetailPiutang');
Route::get('G/detailHutang/','HutangController@jsonDetailHutang');
Route::get('G/Petugas','PetugasMedisController@showAll');
Route::get('G/Petugas/show/{id}','PetugasMedisController@show');
Route::get('G/Kamar/{id}','RawatInap\DataKamar@jsonKamar');
Route::get('G/lihatResep','ResepController@index1');
Route::get('G/Pasien/test','PasienController@test');
Route::get('G/Pasien/test1','PasienController@test1');
Route::get('G/Pasien/test2','PasienController@test2');
Route::get('G/Pasien/show/{id}','PasienController@show');
Route::get('G/Pasien/show1/{id}','PasienController@show1');
Route::get('G/Pendaftaran/Baru/{id}','PendaftaranController@pendaftaranSekarang');
Route::get('G/Pendaftaran/Baru1/{id}/{jml}','PendaftaranController@cekPendaf');
Route::get('G/Pendaftaran/show1/{id}','PendaftaranController@show1');
Route::get('G/Ruang/{id}','RawatInap\DataKamar@jsonRuang');
Route::get('G/tambahOlah/{id}','PengolahanController@jsonHarga');
Route::get('G/TindakanMedis/{id}','TindakanMedisController@detailTindakan');
Route::get('G/Transaksi/test','TransaksiController@store');
Route::get('G/FARMASI/returObat/{id}','ReturPembelianController@getDataPembelian');
Route::get('G/FARMASI/returObat1/{id}','ReturPembelianController@getDataTabelReturPembelian');
Route::get('G/FARMASI/returObatPen/{id}','ReturPenjualanController@getDataPenjualan');
Route::get('G/FARMASI/returObatPen1/{id}','ReturPenjualanController@getDataTabelReturPenjualan');
Route::get('G/viewDataObat','SubGrupController@viewDataObat');
Route::get('G/dataPasienDistribusi/','RawatInap\RekomendasiController@dataPasienDistribusi');
Route::get('G/dataBarang/{id}', 'BarangController@dataBarang1');
Route::get('G/setBarang/{id}','BarangController@jsonBarang');
Route::get('G/obatBebas', 'BarangController@semuaObat');
Route::get('G/obatAlkes', 'BarangController@obatAlkes');
Route::get('G/RWINAP/dataKamar','RawatInap\DataKamar@ketersediaanKamar');
Route::get('G/RWINAP/pasienRWinap','RawatInap\DetailPasienRinap@pasienRWinap');
Route::get('G/dataKelasMedis','HomeController@dataKelasMedis');
Route::get('G/tindakanMedis/{id2}','TindakanMedisController@showList');
Route::get('G/diagnosa','JenisDiagnosaController@showList');
Route::get('Pendaftaran/User','UserController@register');
Route::get('G/belajar','PendaftaranController@belajar');