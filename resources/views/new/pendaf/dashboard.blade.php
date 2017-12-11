<!DOCTYPE html>
<html>
@extends('new.attr.footer')
@extends('new.pendaf.head')

@extends('new.attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('new.pendaf.sidebar')

@section('content')
<body class="hold-transition skin-green-light fixed sidebar-mini">
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
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>150</h3>
                <p>Pendaftaran Hari ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>53</h3>
                <p>IGD</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>44</h3>
                <p>Poli</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
        </div><!-- /.row -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pendaftaran</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>No RM</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Umur</th>
                    <th>Kategori Usia</th>
                    <th style="width:80px;">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>No RM</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Umur</th>
                    <th>Kategori Usia</th>
                    <th style="width:80px;">Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                    <td>{{$row->id_pendaftaran}}</td>
                    <td>{{$row->pasien->no_rm}}</td>
                    <td>{{$row->pasien->nama}}</td>
                    <td>{{$row->pasien->tanggal_lahir}}</td>
                    <td>{{$row->umur}}</td>
                    <td>{{$row->kategori_usia}}</td>
                    <td>                          
                      <a href="#"><button type="button" data-toggle="modal" data-target="#editPendaftaran" onclick="setIsi({{$row->id_pendaftaran}});" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                      <a href="#"><button type="button" data-toggle="modal" data-target="#cetak" class="btn btn-success"><i class="fa fa-print"></i></button></a>
                      <a href="#"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
                  @endforeach
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

@extends('new.pendaf.mod_editDataPendaftaran')
@extends('new.pendaf.mod_cetak')