<!DOCTYPE html>
<html>

<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar');

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
          <li><a href="/igd/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dokter</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Dokter</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <!-- <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahDokter"> <i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
             </form> -->
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID Dokter</th>
                  <td>Nama</td>
                  <td>No SIP</td>
                  <td>Nama Job</td>
                  <td>Tanggal Akhir SIP</td>
                  <td>Alamat</td>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID Dokter</th>
                  <td>Nama</td>
                  <td>No SIP</td>
                  <td>Nama Job</td>
                  <td>Tanggal Akhir SIP</td>
                  <td>Alamat</td>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $r)
                @if($r->id_dokter != 0)
                <tr>
                  <td>{{$r->id_dokter}}</td>
                  <td>{{$r->nama}}</td>
                  <td>{{$r->sip}}</td>
                  <td>{{$r->job->nama_job}}</td>
                  <td>{{$r->tgl_akhir_sip}}</td>
                  <td>{{$r->alamat}}</td>
                </tr>
                @endif
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

</body>
</html>

@extends('new.igd.mod_tambahDataDokter')
@extends('new.igd.mod_editDataDokter')