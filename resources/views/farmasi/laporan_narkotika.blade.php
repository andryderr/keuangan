<!DOCTYPE html>
<html>
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
          <li class="active">Rekom Sajian</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active bg-info"><a href="#psikotropika" data-toggle="tab">Psikotropika</a></li>
              <li class="bg-warning"><a href="#narkotika" data-toggle="tab">Narkotika</a></li>
              <li class="bg-success"><a href="#daftarg" data-toggle="tab">Prekursor Farmasi</a></li>
              <li class="bg-danger"><a href="#oot" data-toggle="tab">Obat Tertentu (OOT)</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="psikotropika">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Laporan Psikotropika</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                   <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr style="background:#E0E0E0;">
                        <th>No</th>
                        <th>ID Penjualan</th>
                        <th>Tanggal</th>
                        <th>No Resep</th>
                        <th>Nama Pasien</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Dokter</th>
                        <th>Nama Obat</th>
                        <th>Qty</th>
                        <th style="width:50px;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php $no = 1;?>
                     @foreach($psiko as $lpp)
                     <tr>
                      <td>{{$no++}}</td>
                      <td>{{$lpp->id_penjualan_barang}}</td>
                      <td>{{$lpp->tanggal_penjualan}}</td>
                      <td>{{$lpp->nomer_resep}}</td>
                      <td>{{$lpp->nama}}</td>
                      <td><?php
                        $tgllahir = $lpp->tanggal_lahir;
                        $tgllhr = new DateTime($tgllahir);
                        $today = new DateTime('today');
                       //tahun
                        $y = $today->diff($tgllhr)->y;
                        //bulan
                        $m = $today->diff($tgllhr)->m;
                        echo $y . " tahun " . $m . " bulan ";
                        ?></td>
                        <td>{{$lpp->alamat}}</td>
                        <td>{{$lpp->nama_dokter}}</td>
                        <td>{{$lpp->nama_barang}}</td>
                        <td>{{$lpp->jumlah}} / {{$lpp->satuan}}</td>
                        <td>                          
                          <a href="/FARMASI/detailLaporanObatKhusus/{{$lpp->id_penjualan_barang}}"><button type="button" class="btn btn-primary"><i class="fa fa-list-alt"></i></button></a> 
                          <!--  -->
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div><!--end .card-body -->
            </div>

            <div class="tab-pane" id="narkotika">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Laporan Narkotika</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr style="background:#E0E0E0;">
                      <th>No</th>
                      <th>ID Penjualan</th>
                      <th>Tanggal</th>
                      <th>No Resep</th>
                      <th>Nama Pasien</th>
                      <th>Umur</th>
                      <th>Alamat</th>
                      <th>Dokter</th>
                      <th>Nama Obat</th>
                      <th>Qty</th>
                      <th style="width:50px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no = 1;?>
                   @foreach($narkotik as $lpn)
                   <tr>
                    <td>{{$no++}}</td>
                    <td>{{$lpn->id_penjualan_barang}}</td>
                    <td>{{$lpn->tanggal_penjualan}}</td>
                    <td>{{$lpn->nomer_resep}}</td>
                    <td>{{$lpn->nama}}</td>
                    <td><?php
                      $tgllahir = $lpn->tanggal_lahir;
                      $tgllhr = new DateTime($tgllahir);
                      $today = new DateTime('today');
                       //tahun
                      $y = $today->diff($tgllhr)->y;
                        //bulan
                      $m = $today->diff($tgllhr)->m;
                      echo $y . " tahun " . $m . " bulan ";
                      ?></td>
                      <td>{{$lpn->alamat}}</td>
                      <td>{{$lpn->nama_dokter}}</td>
                      <td>{{$lpn->nama_barang}}</td>
                      <td>{{$lpn->jumlah}} / {{$lpn->satuan}}</td>
                      <td>                          
                        <a href="/FARMASI/detailLaporanObatKhusus/{{$lpn->id_penjualan_barang}}"><button type="button" class="btn btn-primary"><i class="fa fa-list-alt"></i></button></a> 
                        <!--  -->
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div><!--end .card-body -->
          </div>

          <div class="tab-pane" id="daftarg">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Prekursor Farmasi</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
               <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr style="background:#E0E0E0;">
                    <th>No</th>
                    <th>ID Penjualan</th>
                    <th>Tanggal</th>
                    <th>No Resep</th>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Dokter</th>
                    <th>Nama Obat</th>
                    <th>Qty</th>
                    <th style="width:50px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php $no = 1;?>
                 @foreach($daftarg as $lpg)
                 <tr>
                  <td>{{$no++}}</td>
                  <td>{{$lpg->id_penjualan_barang}}</td>
                  <td>{{$lpg->tanggal_penjualan}}</td>
                  <td>{{$lpg->nomer_resep}}</td>
                  <td>{{$lpg->nama}}</td>
                  <td><?php
                    $tgllahir = $lpg->tanggal_lahir;
                    $tgllhr = new DateTime($tgllahir);
                    $today = new DateTime('today');
                       //tahun
                    $y = $today->diff($tgllhr)->y;
                        //bulan
                    $m = $today->diff($tgllhr)->m;
                    echo $y . " tahun " . $m . " bulan ";
                    ?></td>
                    <td>{{$lpg->alamat}}</td>
                    <td>{{$lpg->nama_dokter}}</td>
                    <td>{{$lpg->nama_barang}}</td>
                    <td>{{$lpg->jumlah}} / {{$lpg->satuan}}</td>
                    <td>                          
                      <a href="/FARMASI/detailLaporanObatKhusus/{{$lpg->id_penjualan_barang}}"><button type="button" class="btn btn-primary"><i class="fa fa-list-alt"></i></button></a> 
                      <!--  -->
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="oot">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Obat Obat Tertentu</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <table class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                 <th>No</th>
                 <th>ID Penjualan</th>
                 <th>Tanggal</th>
                 <th>No Resep</th>
                 <th>Nama Pasien</th>
                 <th>Umur</th>
                 <th>Alamat</th>
                 <th>Dokter</th>
                 <th>Nama Obat</th>
                 <th>Qty</th>
                 <th style="width:50px;">Aksi</th>
               </tr>
             </thead>
             <tbody>
               <?php $no = 1;?>
               @foreach($obatT as $obt)
               <tr>
                <td>{{$no++}}</td>
                <td>{{$obt->id_penjualan_barang}}</td>
                <td>{{$obt->tanggal_penjualan}}</td>
                <td>{{$obt->nomer_resep}}</td>
                <td>{{$obt->nama}}</td>
                <td><?php
                  $tgllahir = $obt->tanggal_lahir;
                  $tgllhr = new DateTime($tgllahir);
                  $today = new DateTime('today');
                       //tahun
                  $y = $today->diff($tgllhr)->y;
                        //bulan
                  $m = $today->diff($tgllhr)->m;
                  echo $y . " tahun " . $m . " bulan ";
                  ?></td>
                  <td>{{$obt->alamat}}</td>
                  <td>{{$obt->nama_dokter}}</td>
                  <td>{{$obt->nama_barang}}</td>
                  <td>{{$obt->jumlah}} / {{$obt->satuan}}</td>
                  <td>                          
                    <a href="/FARMASI/detailLaporanObatKhusus/{{$obt->id_penjualan_barang}}"><button type="button" class="btn btn-primary"><i class="fa fa-list-alt"></i></button></a> 
                    <!--  -->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</section>
</div>
</div>
</div>        


@endsection

</body>
</html>

@extends('farmasi.mod_tambahGudang')
@extends('farmasi.mod_editGudang')