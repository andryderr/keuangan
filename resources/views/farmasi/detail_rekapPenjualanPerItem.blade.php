<!DOCTYPE html>
<html>
@extends('attr.footer')
@extends('farmasi.head')
<!-- <link rel="stylesheet" href="{{url('../assets/cetak/pembelianBahanBaku.css')}}"> -->

@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
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
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Rekapitulasi Transaksi Penjualan</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">

           <form class="" action="" method="">
             <div class="form-group col-md-5">
              <label>Bulan</label>
              <select class="form-control">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <div class="form-group col-md-5">
              <label>Tahun</label>
              <select class="form-control">
               <?php for ($i=1990; $i <= 2050; $i++) { 
                ?>
                <option>{{$i}}</option>
                <?php
              }?>
            </select>
          </div>
          <div class="form-group col-md-2">
           <a href="#"><button type="submit" style="margin-top:25px; width:150px;" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button></a>
         </div>
       </form>
       <br>

       <div class="box-body">
        <div class="col-md-12">
          <br>
          <table class="table table-hover" cellspacing="0" width="100%">
            <thead>
              <tr style="background:#E0E0E0;">
                <th>No</th>
                <th>Tanggal Beli</th>
                <th>No Penj.</th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Harga Modal(Rp)</th>
                <th>Harga Jual(Rp)</th>
                <th>Resep/Racik</th>
                <th>Qty</th>
                <th>Subtotal(Rp)</th>
                <th>Untung(Rp)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php $no = 1; 
                $totaluntung = 0;
                $omset = 0;
                $subtotal = 0;
                $biayatamb = 0;
                ?>
                @foreach($data as $rows)
                <td>{{$no++}}</td>
                <td>{{$rows->penjualan->tanggal_penjualan}}</td>
                <td>{{$rows->id_penjualan_barang}}</td>
                <td>{{$rows->barang->id_barang}}</td>
                <td>{{$rows->barang->nama_barang}}</td>
                <td>{{number_format($rows->barang->harga,0,".",".")}}</td>
                <td>{{number_format($rows->harga,0,".",".")}}</td>
                <?php 
                $biayatamb = $rows->biaya_resep + $rows->biaya_racik;
                ?>
                <td>{{number_format($biayatamb,0,".",".")}}</td>
                <td>{{number_format($rows->totalqty,0,".",".")}}</td>
                <?php 
                $hargabeli = $rows->barang->harga;
                $hargajual = $rows->harga;
                $stokterjual = $rows->totalqty;
                $untung =  ($hargajual - $hargabeli)*($stokterjual);
                $totaluntung += $untung;
                $subtotal = ($hargajual * $stokterjual) + $biayatamb;
                $omset += $subtotal; 
                ?>
                <td>{{number_format($subtotal,0,".",".")}}</td>
                <td>{{number_format($untung,0,".",".")}}</td>
              </tr>
              @endforeach
              <br>
              <tbody class="jumlahTagihan">
                <tr>
                  <td colspan="6"></td>
                  <td colspan="3"><h4>Total Omset Penjualan (Rp.) :</h4></td>
                  <td colspan="1"><h4><strong>{{number_format($omset,0,".",".")}}</strong></h4></td>
                  <td colspan="0"><h4><strong>{{number_format($totaluntung,0,".",".")}}</strong></h4></td>

                </tr>

              </tbody>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="7"></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>

    </div><!--end .card-body -->
  </div>
</div>
</div>
@endsection

</body>
</html>
