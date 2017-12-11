<!DOCTYPE html>
<html>
@extends('attr.footer')
@extends('rawatInap.head')

@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('rawatInap.sidebar')

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
              <h3 class="box-title">Data Pasien RWINAP</h3>
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
                    <td>{{$row->pasien->no_rm}}</td>
                    <td>{{$row->pasien->nama}}</td>
                    <td>{{$row->pasien->tanggal_lahir}}</td>
                    <td>{{$row->umur}}</td>
                    <td>{{$row->kategori_usia}}</td>
                    <td>                          
                      <button type="button" data-toggle="modal" data-target="#editPasien" onclick="ubahPasien('{{$row->no_rm}}')" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                      <a href="{{url('/RWINAP/dataPasien/diagnosaPasien')}}/{{$row->no_rm}}"><button type="button" class="btn btn-success"><i class="fa fa-stethoscope"></i></button></a>
                      <a href="{{url('RWINAP/dataPasien/utilitasKamar/')}}/{{$row->no_rm}}"><button type="button" class="btn btn-primary"><i class="fa fa-bed"></i></button></a>
                      <a href="{{url('/RWINAP/dataPasien/cetakBilling')}}/{{$row->id_pendaftaran}}"><button type="button" class="btn btn-success"><i class="fa fa-dollar"></i></button></a>
                      <a href="#"><button type="button" data-toggle="modal" data-target="#pasienKeluar" class="btn btn-danger"><i class="fa fa-sign-out"></i></button></a>
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

@extends('rawatInap.mod_editDataPasien')
@extends('rawatInap.mod_pasien_keluar')