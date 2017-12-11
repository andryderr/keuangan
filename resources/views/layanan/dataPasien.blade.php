<!DOCTYPE html>
<html>
@extends('attr.footer')
@extends('layanan.head')


@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('layanan.sidebar')

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
              <h3 class="box-title">Data Pasien Rawat Inap</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr style="background:#E0E0E0;">
                    <th>No Pendaftaran</th>
                    <th>Nama</th>
                    <th>Pemeriksaan</th>
                    <th style="width:150px;">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr style="background:#E0E0E0;">
                   <th>No Pendaf</th>
                   <th>Nama</th>
                   <th>Pemeriksaan</th>
                   <th style="width:150px;">Aksi</th>
                 </tr>
               </tfoot>
               <tbody>
               @foreach($data as $row)
                <tr>
                  <td>{{$row->id_pendaftaran}}</td>
                  <td>{{$row->pasien->nama}}</td>
                  <td>{{$row->memo}}</td>
                  <td>                          
                    <button type="button" data-toggle="modal" data-target="#editPasien" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                    <a href="{{url('/LAYANAN/dataPasien/Pemeriksaan')}}/{{$row->id_pendaftaran}}"><button type="button" class="btn btn-success"><i class="fa fa-stethoscope"></i></button></a>
                  </td>
                </tr>
                @endForeach
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

@extends('layanan.mod_editDataPasien')