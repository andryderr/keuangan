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
            <h3 class="box-title">Detail Barang Gudang</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">

           <form class="form-horizontal">
            <div class="box-body col-md-5">

              <div class="input-group">
                <span class="input-group-addon">Tanggal Stok</span>
                <input type="text"  class="form-control" placeholder="" readonly name="" id="" value="<?php 
                date_default_timezone_set('Asia/Jakarta');
                $tanggal = date('d-m-Y H:i:s');
                echo "$tanggal"; 
                ?>">  
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon">Nomer Bukti</span>
                <input type="text"  class="form-control" placeholder="" readonly name="" id="" value="o1o23i123">
              </div>
            </div>

            <div class="col-md-5" style="margin-top:10px;">
             <div class="input-group">
              <span class="input-group-addon" style="padding-right:38px">Nama Gudang</span>
              <input type="text" readonly="" class="form-control" value="Gudang A" placeholder="" name="" id="">
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon" style="padding-right:38px">Nama Pegawai</span>
              <input type="text"  class="form-control" placeholder="" readonly name="" id="" value="Yofanda">
            </div>
            <br>
            
            <br>
          </div>
        </form>
        <br>

        <div class="box-body">
          <div class="col-md-12">
            <br>
            <br>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>ID</th>
                  <th>Bahan Baku</th>
                  <th>Satuan</th>
                  <th>Quantity</th>
                  <th>Harga</th>
                  
                </tr>
              </thead>

              <tbody>
                <?php $no = 1; ?>
                <tr>
                  <td>{{$no++}}</td>
                  <td>fa79</td>
                  <td>Paramex</td>
                  <td>Tablet</td>
                  <td>10</td>
                  <td>10000</td>
                  
                </tr>
                <tr>
                 <td>{{$no++}}</td>
                 <td>fa79</td>
                 <td>Demacolin</td>
                 <td>Kapsul</td>
                 <td>10</td>
                 <td>10000</td>

               </tr>
             </tbody>
             <tbody class="jumlahTagihan">
              <tr class="bg-success">
                <td colspan="4"></td>
                <td><h3><strong>Total :</strong></h3></td>
                <td colspan="1"><input type="text" style="font-size:25px; font-weight:bold; margin-top:18px; width:200px" readonly="" class="form-control" value="20000" name="" id="total"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div><!--end .card-body -->
  </div>
</div>
</div>
@endsection
