<!DOCTYPE html>
<html>

@extends('new.attr.sidebar')
<link rel="stylesheet" href="{{url('../assets/cetak/cetakBilling.css')}}">

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Tagihan
					<small>Rawat Inap</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>

			<div class="container-fluid">

				<!-- Main content -->
				<section class="content">
					<!-- Small boxes (Stat box) -->

					<br>
					<a href="#" class="no-print"><button id="print" type="button" class="btn btn-primary" onclick="print();"><i class="fa fa-print fa-lg"></i></button></a>
					<div class="col-md-12">
						<div class="box">
							<div class="box-body" id="laporan">

								<img class="logoRS" src="{{('/dist/img/logo.png')}}">
								<h3 class="namaRS">RUMAH SAKIT UMUM BAKTI MULIA - MMC</h3>
								<h6 class="alamatRS">Jl. BRAWIJAYA NO. 46-48 MUNCAR Telp.(0333)-590001, HP:0852 597 025 24/ 0878 579 844 50
									<br>61451 BANYUWANGI</h6>
									<br>
									<hr class="garis">

									
									<div id="periodePerawatan">
										<label>Periode Perawatan : 
											<br>
											12-12-1090 s.d 12-12-1212</label>
										</div>
										<h4 class="judul1">Perincian Biaya Perawatan</h4>
										<div class="validasi">
											<label>
												Validasi : R0044682T000006728
											</label>
										</div>

										<div class="noKwi">
											<label>No. Kwitansi : 123456789
											</label></div> 
											<br>
											<br>

											<table>
												<tr>
													<td>No Medrec</td>
													<td class="isi">: 04-00-01</td> 
													<td class="dataKanan">Tgl Masuk</td>
													<td class="isi">: 04-05-2017 19:16:07</td> 
												</tr> 
												<tr>
													<td>Nama Pasien</td>
													<td class="isi">: PUJA NUR FITRI</td> 
													<td class="dataKanan">Tgl Keluar</td>
													<td class="isi">: 12-05-2017 19:16:07</td> 
												</tr>    
												<tr>
													<td>Jns Kel/ Umur</td>
													<td class="isi">: P/ 18 THn 3 Bln 8Hr</td> 
													<td class="dataKanan">Lama Dirawat</td>
													<td class="isi">: 8 hari</td> 
												</tr>
												<tr>
													<td>Jenis Pasien</td>
													<td class="isi">: UMUM</td> 
													<td class="dataKanan">Unit Perawatan</td>
													<td class="isi">: GEDUNG BARAT</td> 
												</tr> 
												<tr>
													<td>Alamat Pasien</td>
													<td class="isi" >: PLAOSAN RT 3, RW 1 TEMUREJO - BANGREJO - BANYUWANGI- Jawa Timur</td> 
												</tr>                 
											</table>
											<br>

											<table class="table table-striped table-bordered">
												<thead>
													<tr style="background:#E0E0E0;">
														<th>Nama Unit / ID transaksi</th>
														<th>Nama Transaksi</th> 
														<th>Quantity</th>
														<th>Tagihan Pasien</th>
														<th>Tagihan PKS</th> 
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="unit" colspan="6">POLI UMUM</td>
													</tr>
													<tr>
														<td>210221001</td>
														<td>Pendaftaran Pasien Baru</td>
														<td>1</td>
														<td>17,875</td>
														<td>0</td>
													</tr>
													<tr>
														<td colspan="2"></td>
														<td>Sub Total</td>
														<td colspan="2">17,875</td>
													</tr>
												</tbody>
												<tbody>
													<tr>
														<td class="unit" colspan="6">INSTALASI GAWAT DARURAT</td>
													</tr>
													<tr>
														<td>210208002</td>
														<td>Pasang Infus Dewasa Cainis</td>
														<td>1</td>
														<td>35,750</td>
														<td>0</td>
													</tr>
													<tr>
														<td>210203002</td>
														<td>Konsultasi Dokter Spesialis Dr. Norman Yusuf SpOG</td>
														<td>1</td>
														<td>52,800</td>
														<td>0</td>
													</tr>
													<tr>
														<td>210203002</td>
														<td>Pemeriksaan Dokter Umum Dr. Arfis</td>
														<td>1</td>
														<td>34,375</td>
														<td>0</td>
													</tr>
													<tr>
														<td colspan="2"></td>
														<td>Sub Total</td>
														<td colspan="2">122,925</td>
													</tr>
												</tbody>

												<tbody class="jumlahTagihan">
													<tr>
														<td colspan="2"></td>
														<td>Grand Total </td>
														<td colspan="2">3,773,556</td>
													</tr>
													<tr>
														<td colspan="2"></td>
														<td>Potongan </td>
														<td colspan="2">23,556</td>
													</tr>
													<tr>
														<td colspan="2"></td>
														<td>Jumlah Tagihan </td>
														<td colspan="2">3,750,000 </td>
													</tr>
												</tbody>
											</table>
											<label> TERBILANG :</label>
											<label id="terbilang">Tiga Juta Tujuh Ratus Lima Puluh Ribu Rupiah</label>
											<br>
											<br>
											<label id="tanggalTerbit">Muncar,
												<?php $tanggal = date('d-m-Y');
												echo($tanggal)
												?>
											</label>
											<br>
											<br>
												
											<div id="petugas">
												<label> Petugas,</label>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<label id="namaPetugas">(Oktiana Dewi P.)</label>
											</div>
											<div id="keluarga">
												<label> Keluarga Pasien,</label>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<label id="titik">(................................)</label>
											</div>
											</div>
										</div>
									</div>

								</div><!--end .card-body -->
							</div>
						</div>
					</div>
					@endsection

				</body>
				</html>