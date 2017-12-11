<!DOCTYPE html>
<html>
@extends('kasir.head')
<link rel="stylesheet" href="{{url('../assets/cetak/cetakBilling.css')}}">
<!-- Left side column. contains the logo and sidebar -->
@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="box-body" id="laporan">

				<img class="logoRS" src="{{('/dist/img/logo.png')}}">
				<h3 class="namaRS">RUMAH SAKIT UMUM BAKTI MULIA - MMC</h3>
				<h6 class="alamatRS">Jl. BRAWIJAYA NO. 46-48 MUNCAR Telp.(0333)-590001, HP:0852 597 025 24/ 0878 579 844 50
					<br>61451 BANYUWANGI</h6>
					<br>
					<hr class="garis">


					<div id="periodePerawatan">
						<label>Kategori Pembelian : 
							<br>{{$data[0]->kat_barang}}</label>
						</div>
						<h4 class="judul1">Struk Pembelian Farmasi</h4>
						<div class="validasi">
							<label>
								Gudang : {{$data[0]->gudang->nama_gudang}}
							</label>
						</div>

						<div  class="noKwi" align="center">
							<label>No. Transaksi : {{$data[0]->id_pembelian_barang}}/PB/<?php echo substr($data[0]->tanggal_pembelian, 5, 2); ?>/<?php echo substr($data[0]->tanggal_pembelian, 0, 4); ?>
							</label>
						</div> 
						<br>
						<br>

						<table>
							<tr>
								<td>No Faktur</td>
								<td class="isi">: {{$data[0]->no_faktur}}</td> 
								<td class="dataKanan">ID Supplier</td>
								<td class="isi">: {{$data[0]->id_supplier}}</td> 
							</tr> 
							<tr>
								<td>Tanggal Faktur</td>
								<td class="isi">: {{$data[0]->tgl_faktur}}</td> 
								<td class="dataKanan">Supplier</td>
								<td class="isi">: {{$data[0]->sup->nama_supplier}}</td> 
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
									<th>Diskon RP</th>
									<th>Diskon 1</th>
									<th>Diskon 2</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<?php $no=1; $jumlah=0;?>
							<tbody>
								@foreach($dataDetail as $row)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$row->id_barang}}</td>
									<td>{{$row->barang->nama_barang}}</td>
									<td>{{$row->satuan}}</td>
									<td>{{$row->jumlah}}</td>
									<td>{{$row->harga}}</td>
									<td>{{$row->diskon_rp}}</td>
									<td>{{$row->diskon_rp1}}</td>
									<td>{{$row->diskon_rp2}}</td>
									<td>{{$row->sub_total}}</td>
								</tr>
								@endForeach
								<br>
							</tbody>
							<tbody class="jumlahTransaksi bg-success">
								<tr style="padding-top: 10px;" class="bg-warning">
									<td colspan="8"></td>
									<td>Grand Total </td>
									<td colspan="1"><strong>{{$data[0]->total}}</strong></td>
								</tr>
								<tr>
									<td colspan="8"></td>
									<td>Netto </td>
									<td colspan="1"><strong>{{$data[0]->netto}}</strong></td>
								</tr>
								<tr>
									<td colspan="5"></td>
									<td>Diskon Pembelian</td>
									<td colspan="2">  {{$data[0]->diskon}}</td>
									<td>Bayar</td>
									@if(count($data[0]->jumlah_bayar) > 0)
									<?php $jumlah = $data[0]->jumlah_bayar ?>
									@elseif(count($data[0]->uang_muka) > 0)
									<?php $jumlah = $data[0]->uang_muka ?>
									@endif
									<td colspan="1"><strong>{{$jumlah}}</strong></td>
								</tr>
								<tr>
									<td colspan="5"></td>
									<td>Pajak % </td>
									<td colspan="2">{{$data[0]->ppn}} / {{$data[0]->ppn_rupiah}} </td>
									@if(count($data[0]->jumlah_bayar) > 0)
									<td>Kembali</td>
									<td colspan="1"><strong><?php echo "0"; ?></strong></td>
									@elseif(count($data[0]->uang_muka) > 0)
									<td>Piutang</td>
									<td colspan="1"><strong><?php echo ($data[0]->netto - $data[0]->uang_muka); ?></strong></td>
									@endif
								</tr>
							</tbody>
						</table>
						<label> TERBILANG :</label>
						<label id="terbilang"><?php
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
							$terbilangnya = terbilang($jumlah, $style=3);
							echo $terbilangnya;
							?></label>
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
				<div class="col-md-12 no-print" style="align-content: center;">
					<button class="btn btn-md btn-success" onclick="print();"  style="margin-left: 10px; "> Print </button>
					<a href="{{url('FARMASI/masterPembelian')}}"><button class="btn btn-md btn-default"> Close </button></a>
				</div>

			</div><!--end .card-body -->
		</div>
		@endsection

	</body>
	</html>