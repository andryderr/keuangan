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
          Kasit
          <small>Setting Transaksi</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Kasir</a></li>
          <li class="active">Setting</li>
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

        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Setting Transaksi</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example" class="table table-striped table-bordered" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID </th>
                      <th>Jenis Transaksi </th>
                      <th>ID Akun</th>
                      <th width="150px";>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID </th>
                      <th>Jenis Transaksi </th>
                      <th>ID Akun</th>
                      <th width="150px";>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>{{$row->id_setting_transaksi}}</td>
                      <td>{{$row->jenis_transaksi}}</td>
                      <td>{{$row->id_akun}}</td>
                      <td>
                        <a href="#" data-toggle="tooltip" title="Setting Akun"><button type="button" onclick="setModalEdit('{{$row->id_setting_transaksi}}','{{$row->jenis_transaksi}}','{{$row->id_akun}}')" data-toggle="modal" data-target="#editTransaksi" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
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
    @extends('kasir.mod_editSettingTransaksi')

    <script>
      function setModalEdit($id, $jenis_transaksi, $id_akun){
        document.getElementById('id').value = $id;
        document.getElementById('jenis_transaksi').value = $jenis_transaksi;
        $("#id_akun option[value="+$id_akun+"]").attr("selected", "selected");
      }
    </script>

  </body>
  </html>