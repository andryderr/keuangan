<!DOCTYPE html>
<html>
@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper no-print">
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
        <div class="row">

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-area-chart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Resep Masuk</span>
                <span class="info-box-number">{{$masuk[0]->masuk}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Resep Menunggu</span>
                <span class="info-box-number">{{$menunggu[0]->menunggu}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Resep Selesai</span>
                <span class="info-box-number">{{$selesai[0]->selesai}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-orange"><i class="fa fa-pie-chart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Stok Obat</span>
                <span class="info-box-number">{{$totalobat[0]->totalbarang}}</span>
                <a href="/FARMASI/dataObat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-plus-square"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Obat Mendekati Expired</span>
                <span class="info-box-number">{{$obatexp[0]->obatexp}}</span>
                <a href="/FARMASI/LaporanKadaluarsa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fa fa-hourglass-2"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Obat Stok Minimum </span>
                <span class="info-box-number">{{$obatminim[0]->stokminim}}</span>
                <a href="/FARMASI/laporanStokMinimal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Pendaftaran</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped datatable table-bordered" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Pendaftaran</th>
                      <th>Nama Pasien</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID Pendaftaran</th>
                      <th>Nama Pasien</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   @foreach($data as $row)
                   <tr>
                     <td>{{$row->id_pendaftaran}}</td>
                     <td>{{$row->pasien->nama}}</td>
                     <td>                          
                      <a href="{{url('/FARMASI/resepObat/')}}/{{$row->id_pendaftaran}}" data-toggle="tooltip" title="Buat Resep"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i></button></a>
                    </td>
                  </tr>
                  @endforeach
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