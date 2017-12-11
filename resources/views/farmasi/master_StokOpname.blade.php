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
          <li class="">Dashboard</li>
          <li class="active">Master Stok Opname</li>
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
              <h3 class="box-title">Data Master Stok Opname</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahMasterOpname"> <i class="glyphicon glyphicon-plus"></i> Tambah Stok Opname</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr class="bg-info">
                  <th>No</th>
                  <th>No Stok Opname</th>
                  <th>Tanggal</th>
                  <th>Gudang</th>
                  <th>Keterangan</th>
                  <th>Pegawai</th>
                  <th style="width:70px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>ID Stok Opname</th>
                  <th>Tanggal</th>
                  <th>Gudang</th>
                  <th>Keterangan</th>
                  <th>Pegawai</th>
                  <th style="width:70px;">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                $no = 1; 
                ?>
                @foreach($data as $row)
                <tr>
                 <td>{{$no++}}</td>
                 <td>{{$row->id_stok_opname}}</td>
                 <td>{{$row->tgl_stok_opname}}</td>
                 <td>{{$row->gudang->nama_gudang}}</td>
                 <td>{{$row->keterangan}}</td>
                 <td>{{$row->user->name}}</td>
                 <td >                                                   
                 @if($row->status == 'Proses')
                  <a href="{{url(Auth::user()->poli->nama_poli.'/detailStokOpname/'.$row->id_stok_opname)}}"><button type="button" class="btn btn-primary"><i class="fa fa-list"></i></button></a>
                  <a href="{{url(Auth::user()->poli->prefix.'/hapusMasterStokOpname/'.$row->id_stok_opname)}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  @else
                  <button class="btn btn-success">Selesai</button>
                  @endif
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
@extends('farmasi.mod_tambahMasterStokOpname')
</body>
</html>
