<!DOCTYPE html>
<html>
@extends('new.attr.sidebar');

<!-- Left side column. contains the logo and sidebar -->

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
        <div class="col-md-12 wow fadeInUp">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pendaftaran</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <tr>
                      <th>ID</th>
                      <th>No RM</th>
                      <th>Nama</th>
                      <th>Tgl Lahir</th>
                      <th>Umur</th>
                      <th>Kategori Usia</th>
                      <th>Tanggal Masuk</th>
                      <th>Action</th>
                    </tr>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>No RM</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Umur</th>
                    <th>Kategori Usia</th>
                    <th>Tanggal Masuk</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($data[0]->pendaftaran as $row)
                  <tr>
                    <td>{{$row->id_pendaftaran}}</td>
                    <td>{{$row->pasien->no_rm}}</td>
                    <td>{{$row->pasien->nama}}</td>
                    <td>{{$row->pasien->tanggal_lahir}}</td>
                    <td>{{$row->umur}}</td>
                    <td>{{$row->kategori_usia}}</td>
                    <td>{{$row->detail[0]->tgl_masuk}}</td>
                    <td>
                      <a href="{{url(Auth::user()->poli->prefix.'/detail/riwayat/')}}/{{$row->id_pendaftaran}}"><button type="button" class="btn btn-primary"><i class="fa fa-check-square-o"></i></button></a>
                    </td>
                  </tr>
                  @endforeach
                </div>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
<script>
  
</script>
</body>
</html>