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
          <li class="active">Grup Obat</li>
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
              <h3 class="box-title">Data Grup Obat</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahJenisSajian"> <i class="glyphicon glyphicon-plus"></i> Tambah Grup Obat</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>ID Grup</th>
                  <th>Nama Grup</th>
                  <th>Kategori Grup</th>
                  <th style="width:400px;">Keterangan</th>
                  <th style="width:150px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                  <th>ID Grup</th>
                  <th>Nama Grup</th>
                  <th>Kategori Grup</th>
                  <th style="width:400px;">Keterangan</th>
                  <th style="width:150px;">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
               @foreach($data as $rows )
               <tr>
                <td>{{$rows->id_grup}}</td>
                <td>{{$rows->nama_grup}}</td>
                <td>{{$rows->kat_grup}}</td>
                <td>{{$rows->keterangan}}</td>
                <td>
                  <a href="/FARMASI/SubGrupObat/{{$rows->id_grup}}" data-toggle="tooltip" title="Detail Subgrup"><button type="button" class="btn btn-primary"><i class="fa fa-list-alt"></i></button></a>                          
                  <a href="#" data-toggle="tooltip" title="Edit Grup"><button type="button" onclick="setGrupEdit('{{$rows->id_grup}}','{{$rows->nama_grup}}','{{$rows->kat_grup}}','{{$rows->keterangan}}');" data-toggle="modal" data-target="#editJenisSajian" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                  <a href="/FARMASI/hapusGrup/{{$rows->id_grup}}" data-toggle="tooltip" title="Hapus"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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

@extends('farmasi.mod_tambahGrupObat')
@extends('farmasi.mod_editGrupObat')
@endsection
<script>
  function setGrupEdit($idGrup, $nama_grup, $kat_grup, $keterangan){
    document.getElementById('id_grup').value = $idGrup;
    document.getElementById('nama_grup').value = $nama_grup;
    document.getElementById('kat_grup').value = $kat_grup;
    document.getElementById('keterangan').value = $keterangan;
  }
</script>
</body>
</html>
