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
          <li class="active">Penjualan Bahan Baku</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Rekapitulasi Penjualan Obat</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$transaksi[0]->total_transaksi}}</h3>
                  <p>Total Transaksi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-refresh"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{$totjual[0]->total_jual}}</h3>
                  <p>Penjualan Stok Obat</p>
                </div>
                <div class="icon">
                  <i class="fa fa-area-chart"></i>
                </div>
                <a href="/FARMASI/detailRekapPenjualanPerItem" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->


            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>Rp. {{number_format($totuangjual[0]->total_uang_jual,0,".",".")}}</h3>
                  <p>Perolehan Penjualan Obat</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cart-plus"></i>
                </div>
                <a href="/FARMASI/detailRekapPenjualanPerItem" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
            </div><!-- /.row -->


          </form>
          <br>
        </div>
      </div>

      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Riwayat Penjualan Bahan Baku</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
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
         <br>
         <hr>

         <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr style="background:#E0E0E0;">
              <th>Nomer Transaksi</th>
              <th>Tanggal Jual</th>
              <th>Pembeli</th>
              <th>Pegawai</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr style="background:#E0E0E0;">
             <th>Nomer Transaksi</th>
             <th>Tanggal Jual</th>
             <th>Pembeli</th>
             <th>Pegawai</th>
             <th>Total</th>
             <th>Aksi</th>
           </tr>
         </tfoot>
         <tbody>
          @foreach($data as $data)
          <tr>
            <td>{{$data->id_penjualan_barang}}</td>
            <td>{{$data->tanggal_penjualan}}</td>

            @if(empty($data->cust->nama_cust))
            <td>-</td>
            @else
            <td>{{$data->cust->nama_cust}}</td>
            @endIf

            @if(empty($data->user->name))
            <td>-</td>
            @else
            <td>{{$data->user->name}}</td>
            @endIf

            <td>{{number_format($data->total,0,".",".")}}</td>
            <td>
              <a href="{{url('/FARMASI/detailRekapPenjualan')}}/{{$data->id_penjualan_barang}}" data-toggle="tooltip" title="Detail Penjualan"><button type="button" class="btn btn-primary"><i class="fa fa-list"></i></button></a>
            </td>
          </tr>
          @endForeach
        </div>


      </tbody>
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