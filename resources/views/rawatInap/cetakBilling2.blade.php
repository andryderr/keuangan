<!DOCTYPE html>
<html>

@extends('new.attr.sidebar')
<link rel="stylesheet" href="{{url('../assets/cetak/cetakBilling.css')}}">
<script src="{{url('/assets/js/jQuery-2.1.4.min.js')}}"></script>

<?php 
function datetimeDiff($dt1, $dt2){
	$t1 = strtotime($dt1);
	$t2 = strtotime($dt2);

	$dtd = new stdClass();
	$dtd->interval = $t2 - $t1;
	$dtd->total_sec = abs($t2-$t1);
	$dtd->total_min = floor($dtd->total_sec/60);
	$dtd->total_hour = floor($dtd->total_min/60);
	$dtd->total_day = floor($dtd->total_hour/24);

	$dtd->day = $dtd->total_day;
	$dtd->hour = $dtd->total_hour -($dtd->total_day*24);
	$dtd->min = $dtd->total_min -($dtd->total_hour*60);
	$dtd->sec = $dtd->total_sec -($dtd->total_min*60);
	return $dtd;
}
?>

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<form action="{{url(Auth::user()->poli->prefix.'/billing/verifikasi')}}" method="post">
				<section class="content-header">
					<h1>
						Tagihan
						<small>{{Auth::user()->poli->nama_poli}}</small>
					</h1>
					<ol class="breadcrumb">
						{{csrf_field()}}
						<input type="hidden" name="id_pendaftaran" value="{{$id}}">
						<input type="hidden" name="total" id="total">
						<button type="button" class="btn btn-info" onclick="print();">Print</button>
						@if($yes == 0)
						<button type="submit" class="btn btn-primary">Verifikasi</button>
						@endif
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Dashboard</li>
					</ol>
				</section>
			</form>

			<div class="container-fluid" id="printing">

				<!-- Main content -->
				<section class="content">
					<!-- Small boxes (Stat box) -->

					<br>
					<div class="col-md-12">
						<div class="box">
							<div class="box-body" id="laporan"">

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
											Validasi : RM{{$d[0]->no_rm}}PDF{{$d[0]->id_pendaftaran}}
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
												<td class="isi">: {{$d[0]->no_rm}}</td> 
												<td class="dataKanan">Tgl Masuk</td>
												<td class="isi">: {{$d[0]->tanggal_daftar}}</td> 
											</tr>
											<tr>
												<td>Nama Pasien</td>
												<td class="isi">: {{$d[0]->pasien->nama}}</td> 
												<td class="dataKanan">Tgl Keluar</td>
												<td class="isi">: {{$d[0]->detail[count($d[0]->detail)-1]->tanggal_keluar}}</td> 
											</tr>    
											<tr>
												<td>Jns Kel/ Umur</td>
												<td class="isi">: {{$d[0]->pasien->jenis_kelamin}}/{{$d[0]->umur}}</td> 
												<td class="dataKanan">Lama Dirawat</td>
												<td class="isi">: 
													<?php 
													
													$diff = 0;
													if (is_null($d[0]->tanggal_keluar)) {
														$t = date("Y-m-d H:i:s");
														$dif = datetimediff($t,$d[0]->tanggal_daftar)->day;
													} else {
														$t = $d->tanggal_keluar;
														$dif = datetimediff($t,$d[0]->tanggal_daftar)->day;
													}
													echo $dif;?> hari</td> 
												</tr>
												<tr>
													<td>Jenis Pasien</td>
													<td class="isi">: {{$d[0]->pasien_baru_lama}}</td> 
													<td class="dataKanan">Unit Perawatan</td>
													<td class="isi">: {{$d[0]->detail[0]->poli->nama_poli}}</td> 
												</tr> 
												<tr>
													<td>Alamat Pasien</td>
													<td class="isi" >: Dusun {{$d[0]->pasien->dusun}} Desa {{$d[0]->pasien->desa}} Kecamatan {{$d[0]->pasien->kecamatan}} Kabupaten {{$d[0]->pasien->kabupaten}}</td> 
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
												<?php 
												$sub = 0;
												$total = 0;
												?>
												<tbody>
													<?php $i = 0;$arr = array(); $simp = array(); $simp2 = array(); ?>
													@foreach($data as $r)
													<?php $ok = true;$sub1 = 0; ?>
													<?php for ($k=0; $k < count($arr); $k++) { 
														if ($r['unit'] == $arr[$k]) {
															$ok = false;
															break;
														}
													} ?>
													@if($ok)
													<tr id="{{$r['unit']}}">
														<td class="unit" colspan="6">{{$r['unit']}}</td>
													</tr>
													@foreach($r['tindakan_medis'] as $ra)
													<tr>
														<td>{{$ra[0]}}</td>
														<td>{{$ra[1]}}</td>
														<td class="text-center" id="{{str_replace(' ','_',$r['unit']).str_replace(' ','_',$ra[1])}}q">{{$ra[2]}}</td>
														<td class="pull-right" id="{{str_replace(' ','_',$r['unit']).str_replace(' ','_',$ra[1])}}h">{{number_format((int)$ra[3],0,".",".")}}</td>
														<td>0</td>
													</tr>
													<?php $sub1+= (int)$ra[3]; ?>
													@endforeach
													<?php $arr[$i++] = $r['unit']; ?>
													<tr>
														<td colspan="2"></td>
														<td  class="text-center">Sub Total</td>
														<td class="pull-right" colspan="2" id="sub_{{$r['unit']}}">{{number_format($sub1,0,".",".")}}</td>
													</tr>
													<?php $total += $sub1; ?>
													@else 
													<?php 
													$datan = array();
													$datan['unit'] = str_replace(' ','_',$r['unit']);
													$datan['tindakan_medis'] = $r['tindakan_medis']; 
													array_push($simp,$datan);
													?>
													@endif
													@endforeach

													@if(count($d[0]->resep) > 0)
													<tr>
														<td class="unit" colspan="6">FARMASI</td>
													</tr>
													<?php $sub1 = 0; ?>
													@foreach($d[0]->resep as $rese)
													<tr>
														<td>{{$rese->id_resep}}|{{$rese->nomer_resep}}</td>
														<td>Pembelian Obat ({{$rese->tanggal_resep}})</td>
														<td class="text-center">1</td>
														<td class="pull-right">{{number_format($rese->total,0,".",".")}}</td>
														<td>0</td>
													</tr>
													<?php $sub1+= $rese->total; ?>
													@endforeach
													@foreach($d[0]->penjualan as $da)
													@foreach($da->obatKembali as $o)
													<tr>
														<td>{{$o->id_retur_pen}}</td>
														<td>Retur Obat ({{date('Y-m-d',strtotime($o->tanggal_retur))}})</td>
														<td class="text-center">1</td>
														<td class="pull-right">-{{number_format($o->netto,0,".",".")}}</td>
													</tr>
													<?php $sub1 -=$o->netto; ?>
													@endforeach
													@endforeach
													<tr>
														<td colspan="2"></td>
														<td  class="text-center">Sub Total</td>
														<td class="pull-right" colspan="2">{{number_format($sub1,0,".",".")}}</td>
													</tr>
													<?php $total += $sub1; ?>
													@endif
												</tbody>
												<tbody class="jumlahTagihan">
													<tr>
														<td colspan="2"></td>
														<td  class="text-center">Grand Total </td>
														<td class="pull-right" colspan="2" id="grand_tot">{{number_format($total,0,".",".")}}</td>
													</tr>
													<?php $potongan = 0; $jumlah = $total-$potongan; ?>
													<tr>
														<td colspan="2"></td>
														<td class="text-center">Potongan </td>
														<td class="pull-right" colspan="2">{{number_format($potongan,0,".",".")}}</td>
													</tr>
													<tr>
														<td colspan="2"></td>
														<td class="text-center">Jumlah Tagihan </td>
														<td class="pull-right" colspan="2" id="totalS">{{number_format($jumlah,0,".",".")}}</td>
													</tr>
												</tbody>
											</table>
											<label> TERBILANG :</label>
											<label id="terbilang"></label>
											<br>
											<br>
											<label id="tanggalTerbit">Muncar,
												<?php $tanggal = date('d-m-Y');
												echo($tanggal)
												?>
											</label>
											<div id="petugas">
												<label> Petugas,</label>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<label id="namaPetugas">( {{Auth::user()->name}} )</label>
											</div>
											<div id="keluarga">
												<label> Keluarga Pasien,</label>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<label id="titik">(...........................................)</label>
											</div>
										</div>
									</div>
								</div>

							</div><!--end .card-body -->
						</div>
					</div>
				</div>
				<script type="text/javascript">

					function terbilang(bilangan) {

						bilangan    = String(bilangan);
						var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
						var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
						var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');

						var panjang_bilangan = bilangan.length;

						/* pengujian panjang bilangan */
						if (panjang_bilangan > 15) {
							kaLimat = "Diluar Batas";
							return kaLimat;
						}

						/* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
						for (i = 1; i <= panjang_bilangan; i++) {
							angka[i] = bilangan.substr(-(i),1);
						}

						i = 1;
						j = 0;
						kaLimat = "";


						/* mulai proses iterasi terhadap array angka */
						while (i <= panjang_bilangan) {

							subkaLimat = "";
							kata1 = "";
							kata2 = "";
							kata3 = "";

							/* untuk Ratusan */
							if (angka[i+2] != "0") {
								if (angka[i+2] == "1") {
									kata1 = "Seratus";
								} else {
									kata1 = kata[angka[i+2]] + " Ratus";
								}
							}

							/* untuk Puluhan atau Belasan */
							if (angka[i+1] != "0") {
								if (angka[i+1] == "1") {
									if (angka[i] == "0") {
										kata2 = "Sepuluh";
									} else if (angka[i] == "1") {
										kata2 = "Sebelas";
									} else {
										kata2 = kata[angka[i]] + " Belas";
									}
								} else {
									kata2 = kata[angka[i+1]] + " Puluh";
								}
							}

							/* untuk Satuan */
							if (angka[i] != "0") {
								if (angka[i+1] != "1") {
									kata3 = kata[angka[i]];
								}
							}

							/* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
							if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
								subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
							}

							/* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
							kaLimat = subkaLimat + kaLimat;
							i = i + 3;
							j = j + 1;

						}

						/* mengganti Satu Ribu jadi Seribu jika diperlukan */
						if ((angka[5] == "0") && (angka[6] == "0")) {
							kaLimat = kaLimat.replace("Satu Ribu","Seribu");
						}

						return kaLimat + "Rupiah";
					}
					$(document).ready(function(){
						a = {{$jumlah}};
						$("#terbilang").append(terbilang(a));
					});
				</script>
				@endsection
				<script>
					function setCur(total){
						totA = total.split('').reverse();
						// alert(totA);
						t = '';
						is = 0;
						totA.forEach( function(element, index) {
							// console.log(element);
							t += element;
							is++;
							if(is%3 == 0){
								if (totA[is] != null) {
									t += '.';
								}
							}
						});
						t = t.split('').reverse().join('');
						return t;
					}
					$(document).ready(function(){
						$('#total').val('{{$jumlah}}');
						gtot = 0;
						dataku = <?php echo json_encode($simp); ?>;
						dataku.forEach( function(element, index) {
							// console.log(element['tindakan_medis']);
							sim = '';
							uni = element.unit.replace(' ','_');
							// alert(uni);
							jmlSub = 0;
							element['tindakan_medis'].forEach( function(element1, index1) {
								ck = element1[1].replace(' ','_');
								// alert('#'+uni+ck+'q');
								if ($('#'+uni+ck+'q') != null) {
									// alert($('#'+element.unit+element1[1]+'q') == null);
									a = document.getElementById(uni+ck+'q').innerHTML;
									b = document.getElementById(uni+ck+'h').innerHTML;
									c = b.replace('.','');
									// alert(a);
									$('#'+uni+ck+'q').empty();
									$('#'+uni+ck+'h').empty();
									d = (Number(c)+Number(element1[3]));
									// d.formatCurrency();
									$('#'+uni+ck+'q').append(''+(Number(a)+Number(element1[2])).toString());
									$('#'+uni+ck+'h').append(''+setCur(d.toString()));
								}else{
									sim+="<tr>";
									sim+="<td>"+element1[0]+"</td>";
									sim+="<td>"+element1[1]+"</td>";
									sim+="<td class='text-center' id='"+uni+element1[0]+"'>"+element1[2]+"</td>";
									sim+="<td class='pull-right'>"+element1[3]+"</td>";
									sim+="<td>0</td>";
									sim+="</tr>";
								}
								jmlSub+=Number(element1[3]);
							});
							$('#'+uni).after(sim);
							k = document.getElementById('sub_'+uni).innerHTML.replace('.','');
							sb = (Number(k)+Number(jmlSub));
							$('#sub_'+uni).empty();
							$('#sub_'+uni).append(setCur(sb.toString()));
							l = document.getElementById('totalS').innerHTML.replace(/\./g,'');
							tot = (Number(l)+Number(jmlSub));
							$('#totalS').empty().append(setCur(tot.toString()));
							m = document.getElementById('grand_tot').innerHTML.replace(/\./g,'');
							gtot = (Number(m)+Number(jmlSub));
							$('#grand_tot').empty().append(setCur(gtot.toString()));
							// alert(setCur(gtot.toString()));
							$("#terbilang").empty();
							$("#terbilang").append(terbilang(gtot));
						});
						
					});
					function printDiv(divName) {
						var printContents = document.getElementById(divName).innerHTML;
						var originalContents = document.body.innerHTML;

						document.body.innerHTML = printContents;

						window.print();

						document.body.innerHTML = originalContents;
					}
				</script>
			</body>
			</html>