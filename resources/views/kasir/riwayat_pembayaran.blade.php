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
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Riwayat Pembayaran</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example" class="table table-striped table-bordered" cellspacing="0">
                  <thead class="bg-info">
                    <tr>
                      <th>No</th>
                      <th>No. RM</th>
                      <th>Nama</th>
                      <th>PJ Pasien</th>
                      <th>Tgl Daftar</th>
                      <th>Tgl Keluar</th>
                      <th>Tagihan</th>
                      <td style="width: 100px;">Action</td>
                    </tr>
                  </thead>
                  <tfoot class="bg-info">
                    <tr>
                      <th>No</th>
                      <th>No. RM</th>
                      <th>Nama</th>
                      <th>PJ Pasien</th>
                      <th>Tgl Daftar</th>
                      <th>Tgl Keluar</th>
                      <th>Tagihan</th>
                      <td>Action</td>
                    </tr>
                  </tfoot>
                  <?php 
                  $no = 1;
                  ?>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                     <td>{{$no++}}</td>
                     <td>{{$row->no_rm}}</td>
                     <td>{{$row->pasien->nama}}</td>
                     <td>{{$row->nama_pj}}</td>
                     <td>{{$row->tanggal_daftar}}</td>
                     <td>{{$row->tanggal_keluar}}</td>
                     <td>{{number_format($row->total,0,".",".")}}</td>
                     <td>
                      <a target="blank" href="{{url(Auth::user()->poli->prefix.'/cetakKwitansi/')}}/{{$row->id_pendaftaran}}" data-toggle="tooltip" title="Cetak Kwitansi"><button type="button" class="btn btn-info"><i class="fa fa-check"></i>
                      </button></a>
                      <a target="blank" href="{{url(Auth::user()->poli->prefix.'/dataPasien/cetakBilling/'.$row->id_pendaftaran)}}" data-toggle="tooltip" title="Cetak Billing"><button type="button" class="btn btn-success"><i class="fa fa-dollar"></i></button></a>
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