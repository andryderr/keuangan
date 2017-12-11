<!DOCTYPE html>
<html>
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
          <li class="">Dashboard</li>
          <li class="active">Master Jurnal</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
          @endforeach
        </div> <!-- end .flash-message -->  
        <br>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Master Jurnal</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
              <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
                <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahMasterJurnal" id="tombolTambahMaster"> <i class="glyphicon glyphicon-plus"></i> Tambah Master Jurnal</a>
                <br>
                <br>
              </form>
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr style="background:#E0E0E0;">
                    <th>ID Jurnal</th>
                    <th>Jenis Jurnal</th>
                    <th>Tanggal</th>
                    <th style="width:150px;">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr style="background:#E0E0E0;">
                    <th>ID Jurnal</th>
                    <th>Jenis Jurnal</th>
                    <th>Tanggal</th>
                    <th style="width:150px;">Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($master as $row)
                  <tr>
                    <td>{{$row->id_jurnal}}</td>
                    <td>{{$row->jenis_jurnal}}</td>
                    <td>{{$row->tgl_jurnal}}</td>
                    <td>
                      <a href="{{url(Auth::user()->poli->nama_poli.'/detailJurnal/'.$row->id_jurnal)}}" data-toggle="tooltip" title="detail_jurnal"><button type="button" class="btn btn-primary"><i class="fa fa-ellipsis-h"></i></button></a>
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

@extends('keuangan.mod_tambahMasterJurnal')
@endsection

</body>
</html>
