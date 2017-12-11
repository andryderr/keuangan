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
          <li class="active">Master Distribusi Barang</li>
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
              <h3 class="box-title">Data Master Distribusi Barang</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
              <a href="{{url('/FARMASI/PemindahanBarang')}}" class="btn btn-success btn-md" id=""> <i class="glyphicon glyphicon-plus"></i> Tambah Distribusi</a>
              <br>
              <br>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>No Entri</th>
                  <th>Tgl Pemindahan</th>
                  <th>Gudang Awal</th>
                  <th>Gudang Tujuan</th>
                  <th>Total</th>
                  <th>Keterangan</th>
                  <th style="width:100px;">Aksi</th>
                </tr>
              </thead>
             <tbody>
              <?php $no = 1; ?>
              @foreach($data as $m)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$m->id_pemindahan}}</td>
                <td>{{$m->tgl_pemindahan}}</td>
                <td>{{$m->gudangawal->nama_gudang}}</td>
                <td>{{$m->gudangtujuan->nama_gudang}}</td>
                <td>{{$m->total_pemindahan}}</td>
                <td>{{$m->keterangan}}</td>
                <td>                                       
                  @if($m->total_pemindahan == null)         
                  <a href="{{url('/FARMASI/PemindahanBarang')}}/{{$m->id_pemindahan}}" data-toggle="tooltip" title="Detail Pemindahan"><button type="button" class="btn btn-primary"><i class="fa fa-list"></i></button></a>
                  <a href="/FARMASI/hapusMasterPemindahan/{{$m->id_pemindahan}}" data-toggle="tooltip" title="Hapus Pemindahan" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  @else
                  <a href="{{url('/FARMASI/PemindahanBarang/')}}/{{$m->id_pemindahan}}"><button type="button" class="btn btn-success">Transaksi Selesai</button></a>
                  @endif
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
@extends('farmasi.mod_tambahMasterReturPembelian')
@endsection
</body>
</html>
