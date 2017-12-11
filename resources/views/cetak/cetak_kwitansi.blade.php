<!DOCTYPE html>
<html>
@extends('kasir.head')
<link rel="stylesheet" href="{{url('../assets/cetak/cetakBilling.css')}}">
<!-- Left side column. contains the logo and sidebar -->
@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="container-fluid">

		<!-- Main content -->
		<section class="content">
			<!-- Small boxes (Stat box) -->

			<br>
			<div class="col-md-12">
				<div class="box-body" id="kwitansi">

					<img class="logoRS" src="{{('/dist/img/logo.png')}}">
					<h3 class="namaRS">RUMAH SAKIT UMUM BAKTI MULIA - MMC</h3>
					<h6 class="alamatRS">Jl. BRAWIJAYA NO. 46-48 MUNCAR Telp.(0333)-590001, HP:0852 597 025 24/ 0878 579 844 50
						<br>61451 BANYUWANGI</h6>
						<br>
						<hr class="garis">


						<div id="periodePerawatan">
							<label>
								<br></label>
							</div>
							<h3 class="judulkwi">Tanda Bukti Pembayaran</h3>
							<div class="validasi">
								<label>
								</label>
							</div>
							<br>

							<table id="tabkwi">
								<tr class="antarbaris">
									<td class="">No Kwitansi : <label>{{$data->id_pendaftaran}}</label></td>
								</tr>

								<tr class="antarbaris">
									<td class="pernyataan">Telah Terima Dari</td>
									<td class="isi">: {{$data->pasien->nama}}</td> 
								</tr>    

								<tr class="antarbaris">
									<td class="pernyataan">Uang Sejumlah</td>
									<td class="isi">
										: Rp. {{number_format($data->total,2,',','.')}}
									</td> 
								</tr>

								<tr class="antarbaris">
									<td class="pernyataan">Untuk Pembayaran</td>
									<td class="isi">: Pembayaran Perawatan Rumah Sakit</td> 
								</tr>         
							</table>
							<br>

							<br>
							<br>
							<label id="tanggalTerbit">Muncar,
								<?php
								$bulan = array(
									'01' => 'JANUARI',
									'02' => 'FEBRUARI',
									'03' => 'MARET',
									'04' => 'APRIL',
									'05' => 'MEI',
									'06' => 'JUNI',
									'07' => 'JULI',
									'08' => 'AGUSTUS',
									'09' => 'SEPTEMBER',
									'10' => 'OKTOBER',
									'11' => 'NOVEMBER',
									'12' => 'DESEMBER',
								);
								echo (date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y'));
								?>
							</label>
							<br>
							<br>
							<div id="terbilang">
								<label> Terbilang </label>

								<label id="">
									<?php
									function kekata($x) {
										$x = abs($x);
										$angka = array("", "satu", "dua", "tiga", "empat", "lima",
											"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
										$temp = "";
										if ($x <12) {
											$temp = " ". $angka[$x];
										} else if ($x <20) {
											$temp = kekata($x - 10). " belas";
										} else if ($x <100) {
											$temp = kekata($x/10)." puluh". kekata($x % 10);
										} else if ($x <200) {
											$temp = " seratus" . kekata($x - 100);
										} else if ($x <1000) {
											$temp = kekata($x/100) . " ratus" . kekata($x % 100);
										} else if ($x <2000) {
											$temp = " seribu" . kekata($x - 1000);
										} else if ($x <1000000) {
											$temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
										} else if ($x <1000000000) {
											$temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
										} else if ($x <1000000000000) {
											$temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
										} else if ($x <1000000000000000) {
											$temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
										}    
										return $temp;
									}


									function terbilang($x, $style=4) {
										if($x<0) {
											$hasil = "minus ". trim(kekata($x));
										} else {
											$hasil = trim(kekata($x));
										}    
										switch ($style) {
											case 1:
											$hasil = strtoupper($hasil);
											break;
											case 2:
											$hasil = strtolower($hasil);
											break;
											case 3:
											$hasil = ucwords($hasil);
											break;
											default:
											$hasil = ucfirst($hasil);
											break;
										}    
										return $hasil;
									}
									$nilai = $data->total;
									$terbilangnya = terbilang($nilai, $style=3);
									echo ': '.$terbilangnya.' Rupiah';
									?></label>
								</div>
								<div class="row">
									<div class="col-md-2 col-md-push-10" style="text-align: center;">
										<label>({{Auth::user()->name}})</label>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div><!--end .card-body -->
			</div>
			@endsection
			<script type="text/javascript" src="{{url('plugins/jQuery/jQuery-2.1.4.min.js')}}">

			</script>
			<script type="text/javascript">
				function currencyConverter(number){
					// alert(number);
					for (var i = 0;i < number.length;i++) {
						console.log(number[i]);
					}
				}
				var number = 12345678;
				currencyConverter(number);
			</script>
		</body>
		</html>