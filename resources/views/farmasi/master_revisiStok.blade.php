<!-- <link rel="stylesheet" href="{{url('../assets/cetak/pembelianBahanBaku.css')}}"> -->

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
          <li class="active">Dashboard</li>
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
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Master Revisi Stok Gudang</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
       

        <div class="box-body">
          <a class="btn btn-success btn-md" href="{{url('FARMASI/tambahRevisiStok')}}"> <i class="glyphicon glyphicon-plus"></i> Tambah Revisi Stok</a>
          <br>
          <br>
          <table id="" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr class="bg-info">
                <th>No</th>
                <th>Id Revisi</th>
                <th>Tanggal Revisi</th>
                <th>Nama Gudang</th>
                <th>Keterangan</th>
                <th style="width: 100px;">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php $no = 1; ?>
               @foreach($data as $row)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$row->id_revisi}}</td>
                <td>{{$row->tgl_revisi}}</td>
                <td>{{$row->gudang->nama_gudang}}</td>
                <td>{{$row->keterangan}}</td>
                <td> 
                @if($row->status == 'Proses')
                 <a href="{{url('/FARMASI/RevisiStok/')}}/{{$row->id_revisi}}" data-toggle="tooltip" title="Detail Revisi Stok"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i></button></a>          
                 <a href="{{url('/FARMASI/hapusRevisiStok/')}}/{{$row->id_revisi}}" data-toggle="tooltip" title="Hapus Revisi Stok" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                @else
                 <a href=""><button type="button" class="btn btn-success">Revisi Stok Selesai</button></a>   
                @endif
               </td>
             </tr>
             @endforeach
         </tbody>
       </table>
     </div>
   </div><!--end .card-body -->
 </div>
 </section>
 </div>
</div>
</div>
@endsection
