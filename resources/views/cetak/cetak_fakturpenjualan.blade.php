<!DOCTYPE html>
<html>
@extends('kasir.head')
<link rel="stylesheet" href="{{url('../assets/cetak/cetakBilling.css')}}">
<!-- Left side column. contains the logo and sidebar -->
@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<section class="content-header">
		<h1>
			Struk Penjualan
			<small>Barang</small>
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
								<label>Kategori Penjualan : 
									<br>Resep</label>
								</div>
								<h4 class="judul1">Struk Penjualan Farmasi</h4>
								<div class="validasi">
									<label>
										Hari/Tanggal : Senin/24-03-2017
									</label>
								</div>

								<div  class="noKwi">
									<label>No. Transaksi : 005/JL/005/0123
									</label>
								</div> 
								<br>
								<br>

								<table>
									<tr>
										<td>No Medrec</td>
										<td class="isi">: 04-00-01</td> 
										<td class="dataKanan">No Resep</td>
										<td class="isi">: 1222/121</td> 
									</tr> 
									<tr>
										<td>Nama Pasien</td>
										<td class="isi">: PUJA NUR FITRI</td> 
										<td class="dataKanan">Tgl Resep</td>
										<td class="isi">: 12-05-2017 19:16:07</td> 
									</tr>    
									<tr>
										<td>Customer</td>
										<td class="isi">: Budianto</td> 
										<td class="dataKanan">Dokter</td>
										<td class="isi">: Dr. Andiyanto</td> 
									</tr>
									<tr>
										<td>Petugas</td>
										<td class="isi">: Andi</td> 
									</tr>               
								</table>
								<br>

								<table id="" class="table-bordered table-responsive" width="100%">
									<thead>
										<tr class="bg-info" font-size: 13px;">
											<th>No</th>
											<th>ID</th>
											<th>Bahan Baku</th>
											<th>Satuan</th>
											<th>Quantity</th>
											<th>Harga</th>
											<th>Biaya Racik</th>
											<th>Biaya Resep</th>
											<th>Diskon RP</th>
											<th>Diskon 1</th>
											<th>Diskon 2</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<?php $no=1;?>
									<tbody>
										<tr>
											<td>{{$no++}}</td>
											<td>fa79</td>
											<td>Racik Tipes</td>
											<td>Racikan</td>
											<td>10</td>
											<td>10000</td>
											<td>1000</td>
											<td>1200</td>
											<td>1000</td>
											<td>2%</td>
											<td>3%</td>
											<td>100000</td>
										</tr>
										<br>
									</tbody>
									<tbody class="jumlahTransaksi bg-success">
										<tr style="padding-top: 10px;" class="bg-warning">
											<td colspan="10"></td>
											<td>Grand Total </td>
											<td colspan="1"><strong>36.000</strong></td>
										</tr>
										<tr>
											<td colspan="7"></td>
											<td>Diskon % </td>
											<td colspan="1">20% / 20000</td>
											<td colspan="1"></td>
											<td>Netto </td>
											<td colspan="1"><strong>35.000</strong></td>
										</tr>
										<tr>
											<td colspan="7"></td>
											<td>Diskon Rp</td>
											<td colspan="1">500</td>
											<td colspan="1"></td>
											<td>Bayar</td>
											<td colspan="1"><strong>40.000</strong></td>
											<td colspan="1"></td>
										</tr>
										<tr>
											<td colspan="7"></td>
											<td>Pajak % </td>
											<td colspan="1">5% / 500 </td>
											<td colspan="1"></td>
											<td>Kembali</td>
											<td colspan="1"><strong>5.000</strong></td>
										</tr>
									</tbody>
								</table>
								<label> TERBILANG :</label>
								<label id="terbilang">Tiga Puluh Enam Ribu Rupiah</label>
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
									<label> Homat Kami,</label>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<label id="namaPetugas">(.................)</label>
								</div>
							</div>
						</div>
					</div>

				</div><!--end .card-body -->
			</div>
			@endsection

		</body>
		</html>