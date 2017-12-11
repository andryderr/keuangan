<!-- Left side column. contains the logo and sidebar -->
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

        <div class="col-md-12 no-print">
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
                <h3 class="judul1">Laporan Mutasi Stok Barang</h3>

                <div class="box-tools pull-right no-print">
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
                    <th>ID</th>
                    <th>Barang</th>
                    <th>Gudang</th>
                    <th>Satuan</th>
                    <th>Qty Awal</th>
                    <th>Qty Pembelian</th>
                    <th>Qty Penjualan</th>
                    <th>Qty Retur Pembelian</th>
                    <th>Qty Retur Penjualan</th>
                    <th>Qty Revisi Stok</th>
                    <th>Qty Pemindahan</th>
                    <th>Qty Akhir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $tot_qtyawal = 0;
                  $tot_qtypembelian = 0;
                  $tot_qtypenjualan = 0;
                  $tot_qtyreturpembelian = 0;
                  $tot_qtyreturpenjualan = 0;
                  $tot_qtyrevisi = 0;
                  $tot_qtypemindahan = 0;
                  $tot_qtyakhir = 0;
                   ?>
                   @foreach($mutasi as $mut)
                   <tr>
                    <td>{{$no++}}</td>
                    <td>{{$mut->id_barang}}</td>
                    <td>{{$mut->barang->nama_barang}}</td>
                    <td>{{$mut->gudang->nama_gudang}}</td> 
                    <td>{{$mut->satuan1}}</td>
                    <td>{{$mut->qty_awal}}</td>
                    <td>{{$mut->qty_pembelian}}</td>
                    <td>{{$mut->qty_penjualan}}</td>
                    <td>{{$mut->qty_retur_pembelian}}</td>
                    <td>{{$mut->qty_retur_penjualan}}</td>
                    <td>{{$mut->qty_revisi_stok}}</td>
                    <td>{{$mut->qty_pemindahan}}</td>
                    <td>{{$mut->qty_akhir->qty_akhir}}</td>
                  </tr>
                  <?php 
                  $tot_qtyawal += (int)$mut->qty_awal;
                  $tot_qtypembelian += (int)$mut->qty_pembelian;
                  $tot_qtypenjualan += (int)$mut->qty_penjualan;
                  $tot_qtyreturpembelian += (int)$mut->qty_retur_pembelian;
                  $tot_qtyreturpenjualan += (int)$mut->qty_retur_penjualan;
                  $tot_qtyrevisi += (int)$mut->qty_revisi_stok;
                  $tot_qtypemindahan += (int)$mut->qty_pemindahan;
                  $tot_qtyakhir += (int)$mut->qty_akhir->qty_akhir;
                   ?>
                  @endforeach
                </tbody>        
                 <tbody>
                  <tr style="background:#E0E0E0;">
                    <td colspan="3"><strong>TOTAL GENERAL</strong></td>
                    <td colspan="2"></td>
                    <td><strong>{{$tot_qtyawal}}</strong></td>
                    <td><strong>{{$tot_qtypembelian}}</strong></td>
                    <td><strong>{{$tot_qtypenjualan}}</strong></td>
                    <td><strong>{{$tot_qtyreturpembelian}}</strong></td>
                    <td><strong>{{$tot_qtyreturpenjualan}}</strong></td>
                    <td><strong>{{$tot_qtyrevisi}}</strong></td>
                    <td><strong>{{$tot_qtypemindahan}}</strong></td>
                    <td><strong>{{$tot_qtyakhir}}</strong></td>
                  </tr>  
                </tbody>           
              </table>
              <!-- </div> -->
            </div>
          </div>
        </div><!--end .card-body -->

      </div>
    </div>
    @extends('farmasi.mod_pilihItemLaporan')
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
