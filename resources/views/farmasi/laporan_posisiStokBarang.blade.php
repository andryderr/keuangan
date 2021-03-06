@extends('attr.footer')
@extends('farmasi.head')
<link rel="stylesheet" href="{{url('../assets/cetak/cetakBilling.css')}}">

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
        <br>

        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Filter</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">

              <div class="form-group col-md-6">
                <label>Tanggal Stok</label>
                <input type="text" class="form-control" placeholder="" name="" id="tanggal">
              </div>
              <div class="form-group col-md-6">
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
                <label>Gudang</label>
                <select class="form-control" name="" id="">
                  <option>----</option>
                  <option value="">Gudang 1</option>
                  <option value="">Gudang 2</option>
                </select>
              </div>

              <div class="form-group col-md-2">
                <label>ID Barang</label>
                <input type="text" class="form-control" readonly="" placeholder="" name="" id="id_tampil">
              </div>
              <div class="form-group col-md-5">
                <label>Nama Barang</label>
                <div class="input-group">
                  <input type="text" class="form-control" readonly="" placeholder="" name="nama_barang" id="nama_barang">
                  <span class="input-group-btn">
                    <a data-toggle="modal" data-target="#PilihItemKartuStok" class="btn btn-warning"> <i class="glyphicon glyphicon-search"></i></a>
                  </span>
                </div>
              </div>

              <a class="btn btn-success col-sm-1 pull-right"><i class="">Cari</i></a>

            </div>
          </div>
        </div>
        <br>

        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <img class="logoRS" src="{{('/dist/img/logo.png')}}">
              <h3 class="namaRS">RUMAH SAKIT UMUM BAKTI MULIA - MMC</h3>
              <h6 class="alamatRS">Jl. BRAWIJAYA NO. 46-48 MUNCAR Telp.(0333)-590001, HP:0852 597 025 24/ 0878 579 844 50
                <br>61451 BANYUWANGI</h6>
                <br>
                <hr class="garis">
                <a class="btn btn-primary btn-lg col-sm-1 pull-left no-print" onclick="print();"><i class="fa fa-print fa-lg"></i></a>

                <div id="periodePerawatan">
                  <label>Tanggal Cetak : 
                    <br>
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('d-m-Y G:i:s');
                    echo($tanggal)
                    ?>
                  </label>
                </div>
                <h3 class="judul1">Laporan Posisi Stok Barang</h3>

                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
            <div class="box-body">
              <!-- <div class="table-responsive"> -->
               <div class="form-group pull-right col-md-3">
                  <input type="search" placeholder="Cari disini" data-table="table table-bordered" class="form-control no-print" placeholder="" name="" id="">
                </div>
              <table id="" class="table table-striped table-bordered"  style="font-size: 12px;">
                  <thead>
                    <tr style="background:#E0E0E0;">
                      <th>No</th>
                      <th>No Transaksi</th>
                      <th>Tanggal/Waktu</th>
                      <th>Masuk</th>
                      <th>Keluar</th>
                      <th>Satuan Jual</th>
                      <th>Pegawai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                     $no = 1;
                       for ($i=1; $i < 300; $i++){
                     ?>
                    <tr>
                     <td>{{$no++}}</td>
                      <td>K087068</td>
                      <td>12-Mar-2017 17:80</td>
                      <td>10</td>
                      <td>5</td>
                      <td>-120</td>
                      <td>Andri</td>
                    </tr>
                    <?php } ?>
                  </tbody>
               </table>
             <!-- </div> -->
           </div>
         </div>
       </div><!--end .card-body -->

     </div>
   </div>
   @extends('farmasi.mod_pilihItemLaporan');
   <script>
    function setItem(){
      $('#tombolpilih').click(function() {
        $('#PilihItemKartuStok').modal('hide');
        var nama = document.getElementById("namaitem").innerHTML;
        var id = document.getElementById("id_barang").innerHTML;
        document.getElementById("nama_barang").value = nama;
              document.getElementById("id_tampil").value = id;
      });
    }
  </script>
  @endsection
