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
          <li class="active">Retur Penjualan</li>
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
              <h3 class="box-title">Data Penjualan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

              <br>
              <hr>
              <table id="returpenjualan" class="table table-striped table-bordered" cellspacing="0">
                <thead>
                  <tr class="bg-info">
                    <th>No</th>
                    <th>No Rm</th>
                    <th>No Pendaftaran</th>
                    <th>Nama Pasien</th>
                    <th>Banyak Resep</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>No Rm</th>
                    <th>No Pendaftaran</th>
                    <th>Nama Pasien</th>
                    <th>Banyak Resep</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach($data as $rsp)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$rsp->pendaftaran->pasien->no_rm}}</td>
                    <td>{{$rsp->id_pendaftaran}}</td>
                    <td>{{$rsp->pendaftaran->pasien->nama}}</td>
                    <td>{{$rsp->banyak_resep}}</td>
                    <td>                                             
                     <a href="{{url('/FARMASI/resepObat')}}/{{$rsp->pendaftaran->id_pendaftaran}}" data-toggle="tooltip" title="Detail Riwayat Resep"><button type="button" class="btn btn-success"><i class="fa fa-list"></i></button></a>
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
@endsection
</body>
</html>