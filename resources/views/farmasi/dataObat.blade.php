

<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar')

@section('content')

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
        <li class="active">Sub Grup Obat</li>
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
      <div class="col-md-10">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Sub Grup Obat</h3>
          </div><!-- /.box-header -->
          <div class="box-body">

           <div class="form-group col-md-12 text-center">
            <label for="nama_grup">Nama Grup Obat</label>
            <input style="width:200px; margin-right:auto; margin-left:auto; border:1px solid #000;" type="text" readonly="" value="{{$dataGrup[0]->nama_grup}}" class="form-control text-center" placeholder="" name="nama_grup" id="">
          </div>

          <form class="tomboltext" readonly=""  method="post" action="?" style="margin-bottom:10px;">
           <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahJenisSajian"> <i class="glyphicon glyphicon-plus"></i> Tambah Sub Grup Obat</a>
         </form>
         <table class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr style="background:#E0E0E0;">
            <th>No</th>
              <th>ID Sub Grup Obat</th>
              <th>Nama Sub Grup Obat</th>
              <th>Kategori Grup</th>
              <th style="width:400px;">Keterangan</th>
              <th style="width:150px;">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr style="background:#E0E0E0;">
            <th>No</th>
              <th>ID Sub Grup Obat</th>
              <th>Nama Sub Grup Obat</th>
              <th>Kategori Grup</th>
              <th style="width:400px;">Keterangan</th>
              <th style="width:150px;">Aksi</th>
            </tr>
          </tfoot>
          <?php $no=1;  ?>
          <tbody>
             @foreach($data as $rows)
           <tr>
           <td>{{$no++}}</td>
             <td>{{$rows->id_subgrup}}</td>
             <td>{{$rows->nama_subgrup}}</td>
             <td>{{$rows->kat_subgrup}}</td>
             <td>{{$rows->keterangan}}</td>
             <td>
              <a href="#"><button type="button" data-toggle="modal" data-target="#tambahObat" class="btn btn-success"><i class="fa fa-plus"></i></button></a>                          
              <a href="#"><button type="button" data-toggle="modal" data-target="#detailObat" class="btn btn-primary"><i class="fa fa-list"></i></button></a>                          
              <a href="#"><button type="button"  onclick="setSubGrupEdit('{{$rows->id_subgrup}}','{{$rows->id}}','{{$rows->nama_subgrup}}','{{$rows->kat_subgrup}}','{{$rows->keterangan}}');" data-toggle="modal" data-target="#editJenisSajian" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>

              <a href="/FARMASI/hapusSubGrup/{{$rows->id_subgrup}}"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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

@extends('farmasi.mod_tambahSubGrupObat')
@extends('farmasi.mod_editSubGrupObat')
@extends('farmasi.mod_tambahObat')
@extends('farmasi.mod_detailObat')
@endsection
<script>
  function setSubGrupEdit($idSubGrup, $id, $nama_subgrup, $kat_subgrup, $keterangan){
    document.getElementById('id_subgrup').value = $idSubGrup;
    document.getElementById('id_grup').value = $id;
    document.getElementById('nama_subgrup').value = $nama_subgrup;
    document.getElementById('kat_subgrup').value = $kat_subgrup;
    document.getElementById('keterangan').value = $keterangan;
  }
</script>
