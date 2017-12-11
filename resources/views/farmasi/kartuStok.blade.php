

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
                <label>Range Tanggal</label>
                <input type="text" class="form-control" placeholder="" name="" id="rangetanggal">
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
                <input type="text" class="form-control" placeholder="" name="" id="">
              </div>
              <div class="form-group col-md-5">
                <label>Nama Barang</label>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="" name="nama_barang" id="nama_barang">
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
              <h3 class="box-title">Kartu Stok</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <!-- <div class="table-responsive"> -->
              <table id="example" class="table datatable table-striped table-responsive table-bordered col-md-12"  style="font-size: 10px;">
                  <thead>
                    <tr style="background:#E0E0E0;">
                      <th>No</th>
                      <th>Tgl. Kadaluarsa</th>
                      <th>Tgl. Transaksi</th>
                      <th>No. Transaksi</th>
                      <th>Keterangan</th>
                      <th>Tujuan</th>
                      <th>Stok Awal</th>
                      <th>Masuk</th>
                      <th>Keluar</th>
                      <th>Stock Akhir</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; ?>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>01 Jun 2017</td>
                      <td>15 Jun 17 11:15:32</td>
                      <td>JB2017615.0001</td>
                      <td>Penjualan</td>
                      <td></td>
                      <td>19</td>
                      <td>0</td>
                      <td>2</td>
                      <td>17</td>
                    </tr>
                  </tbody>
                  <tbody>
                   <tr class="bg-success">
                     <td colspan="7"></td>
                     <td class=""><strong>0</strong></td>
                     <td><strong>2</strong></td>
                     <td></td>
                   </tr>
                 </tbody>
               </table>
             <!-- </div> -->
           </div>
         </div>
       </div><!--end .card-body -->

     </div>
   </div>
   @extends('farmasi.mod_pilihItemKartuStok');
   <script>
    function setItem(){
      $('#tombolpilih').click(function() {
        $('#PilihItemKartuStok').modal('hide');
        var nama = document.getElementById("namaitem").innerHTML;
        document.getElementById("nama_barang").value = nama;
      });
    }
  </script>
  @endsection
