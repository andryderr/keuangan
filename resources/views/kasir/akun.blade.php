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
          <li class="active">Akun</li>
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

        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Akun</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahAkun"> <i class="glyphicon glyphicon-plus"></i> Tambah Akun</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>ID Akun</th>
                  <th>Nama Akun</th>
                  <th>Jenis Akun</th>
                  <th style="width=100px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>ID Akun</th>
                  <th>Nama Adasdkun</th>
                  <th>Jenis Akun</th>
                  <th style="width=100px;">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $no = 1; ?>
                @foreach($data as $akun)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$akun->id_akun}}</td>
                  <td>{{$akun->nama_akun}}</td>
                  <td>{{$akun->status_akun}}</td>
                  <td>         
                    <a href="/KASIR/detailAkun/{{$akun->id_akun}}" data-toggle="tooltip" title="Detail Akun"><button type="button" data-toggle="modal" data-target="#tambahDetailAkun" class="btn btn-primary" ><i class="fa fa-list"></i></button></a>                 
                    <a href="#" data-toggle="tooltip" title="Edit Akun"><button type="button" onclick="setModalEdit('{{$akun->id_akun}}','{{$akun->nama_akun}}','{{$akun->status_akun}}')" data-toggle="modal" data-target="#editAkun" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                    <a href="/KASIR/hapusAkun/{{$akun->id_akun}}" data-toggle="tooltip" title="Hapus Akun"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    <!--  -->
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
<script>
  function setModalEdit($idAkun, $namaAkun, $status_akun){
    document.getElementById('id_akun').value = $idAkun;
    document.getElementById('nama_akun').value = $namaAkun;
    document.getElementById('status_akun').value = $status_akun;
  }
</script>

@extends('kasir.mod_tambahAkun')
@extends('kasir.mod_editAkun')
</body>
</html>

