<!DOCTYPE html>
<html>
@extends('new.attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar');

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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pasien IGD</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <tr>
                      <th>ID</th>
                      <th>No RM</th>
                      <th>Nama</th>
                      <th>Tgl Lahir</th>
                      <th>Umur</th>
                      <th>Kategori Usia</th>
                      <th style="width:200px;">Action</th>
                    </tr>
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
                    <th style="width:200px;">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                    <td>{{$row->id_pendaftaran}}</td>
                    <td>{{$row->pendaftaran->pasien->no_rm}}</td>
                    <td>{{$row->pendaftaran->pasien->nama}}</td>
                    <td>{{$row->pendaftaran->pasien->tanggal_lahir}}</td>
                    <td>{{$row->pendaftaran->umur}}</td>
                    <td>{{$row->pendaftaran->kategori_usia}}</td>
                    <td>                          
                      <a href="#" data-toggle="tooltip" title="Info Pasien Keluar"><button type="button" data-toggle="modal" data-target="#editPendaftaran" onclick="setIsi({{$row->id_pendaftaran}});" class="btn btn-info"><i class="fa fa-circle"></i></button></a>
                      <a href="{{url(Auth::user()->poli->prefix.'/dataPasien/cetakBilling')}}/{{$row->id_pendaftaran}}" data-toggle="tooltip" title="Cek Billing"><button type="button" style="width: 37px;" class="btn btn-success"><i class="fa fa-dollar" ></i></button></a>

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

@extends('new.igd.mod_editDataPendaftaran')