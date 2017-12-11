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
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Pembelian Bahan Baku</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Rekapitulasi Pembelian Obat</h3>
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
                  <h3>{{$totbeli[0]->total_beli}}</h3>
                  <p>Pembelian Stok Obat</p>
                </div>
                <div class="icon">
                  <i class="fa fa-area-chart"></i>
                </div>
                <a href="/FARMASI/detailRekapPembelianPerItem" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->


            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>Rp. {{number_format($totuangbeli[0]->total_uang_beli,0,".",".")}}</h3>
                  <p>Pengeluaran Pembelian Obat</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cart-plus"></i>
                </div>
                <a href="/FARMASI/detailRekapPembelianPerItem" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <h3 class="box-title">Riwayat Pembelian Bahan Baku</h3>
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
               <?php for ($i=1990; $i < 2100; $i++) { 
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
              <th>Tanggal Beli</th>
              <th>Supplier</th>
              <th>Pegawai</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr style="background:#E0E0E0;">
             <th>Nomer Transaksi</th>
             <th>Tanggal Beli</th>
             <th>Supplier</th>
             <th>Pegawai</th>
             <th>Total</th>
             <th>Aksi</th>
           </tr>
         </tfoot>
         <tbody>
          @foreach($data as $row)
          <tr>
            <td>{{$row->id_pembelian_barang}}</td>
            <td>{{$row->tanggal_pembelian}}</td>
            <td>{{$row->sup->nama_supplier}}</td>
            @if(empty($row->user->name))
            <td>-</td>
            @else
            <td>{{$row->user->name}}</td>
            @endIf
            <td>{{number_format($row->total,0,".",".")}}</td>
            <td>
              <a href="{{url('/FARMASI/detailRekapPembelian/')}}/{{$row->id_pembelian_barang}}" data-toggle="tooltip" title="Detail Pembelian"><button type="button" class="btn btn-primary"><i class="fa fa-list"></i></button></a>
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