<!DOCTYPE html>
<html>
<link rel="stylesheet" href="{{url('../assets/cetak/hasilPemeriksaan.css')}}">
@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Hasil
					<small>Pemeriksaan</small>
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
					<a href="#" class="no-print"><button id="print" type="button" class="btn btn-success" onclick="print();"><i class="fa fa-print fa-lg"></i></button></a>
					<div class="col-md-12">
						<div class="box">
							<div class="box-body" id="laporan">

								<img class="logoRS" src="{{('/dist/img/logo.png')}}">
								<h3 class="namaRS">LABORATORIUM KLINIK RUMAH SAKIT UMUM BAKTI MULIA - MMC</h3>
								<h6 class="alamatRS">Jl. BRAWIJAYA NO. 46-48 MUNCAR Telp.(0333)-590001, HP:0852 597 025 24/ 0878 579 844 50
									<br>61451 BANYUWANGI</h6>
									<br>
									<br>

									<table>
										<tr>
											<td>No RM</td>
											<td class="isi">:{{$data[0]->detailPendaftaran->pendaftaran->no_rm}}</td> 
											<td class="dataKanan">Tgl Pemeriksaan</td>
											<td class="isi">:{{$data[0]->tanggal_pemeriksaan}}</td> 
										</tr> 
										<tr>
											<td>Jenis Px</td>
											<td class="isi">: {{$data[0]->detailPendaftaran->pendaftaran->jenis_kepesertaan}}</td> 
											<td class="dataKanan">Nama</td>
											<td class="isi">: {{$data[0]->detailPendaftaran->pendaftaran->pasien->nama}}</td> 
										</tr>    
										<tr>
											<td>Jns Kel/ Umur</td>
											<td class="isi">: {{$data[0]->detailPendaftaran->pendaftaran->pasien->jenis_kelamin}}/{{$data[0]->detailPendaftaran->pendaftaran->umur}} </td> 
											<td class="dataKanan">Lama Dirawat</td>
											<td class="isi">: 8 hari</td> 
										</tr>
										<tr>
											<td>Unit</td>
											<td class="isi">: POLI UMUM</td> 
											<td class="dataKanan">Alamat</td>
											<td class="isi">: Kaliproso 1/5 MUNCAR - KAbupaten Banyuwangi - Jawa Timur</td> 
										</tr> 
										<tr>
											<td>No Periksa</td>
											<td class="isi">: Unit Perawatan</td> 
											<td class="dataKanan">Ref. By</td>
											<td class="isi">: </td> 
										</tr> 
										<tr>
											<td>Tgl. Periksa</td>
											<td class="isi">: 04-05-2017 19:16:07</td> 
										</tr>                
									</table>
									<hr class="garis">

									<br>

									<table class="table table-striped table-bordered">
										<thead>
											<tr style="background:#E0E0E0;">
												<th><h5>PEMERIKSAAN</h5></th>
												<th><h5>HASIL</h5></th> 
												<th><h5>NILAI NORMAL</h5></th> 
											</tr>
										</thead>
										@foreach($data[0]->DetailPemeriksaan as $row)
										<tbody>
											<tr>
												<td class="unit" colspan="3">{{$row->JenisPemeriksaan->nama_jenis_pemeriksaan}}</td>
											</tr>
											@foreach($row->hasilPemeriksaan as $r)
											<tr>
												<td id="detail">{{$r->DetailJenisPemeriksaan[0]->detail_pemeriksaan}}</td>
												<td>{{$r->hasil}}</td>
												<td>{{$r->DetailJenisPemeriksaan[0]->nilai_normal}}</td>
											</tr>
											@endforeach
										</tbody>
										@endforeach
									</table>
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