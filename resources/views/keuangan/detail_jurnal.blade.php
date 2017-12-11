@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Jurnal Umum
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
        <br>
        <form class="" action="{{url('FARMASI/updateMasterPembelian')}}" method="post"> 
          {{csrf_field()}}       
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Master Jurnal</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">

                <div class="input-group">
                  <span class="input-group-addon">ID Transaksi</span>
                  <input type="text" class="form-control" placeholder="" readonly name="" id="" value="{{$master[0]->id_jurnal}}">
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon">Jenis Jurnal</span>
                  <input type="text" class="form-control" placeholder="" readonly name="" id="" value="{{$master[0]->jenis_jurnal}}">
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon">Tanggal Transaksi</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="tgl_pembelian" id="" 
                  value="{{$master[0]->tgl_jurnal}}">  
                </div>
                <br>
              </div>
            </div>
          </div>
        </form>


        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Posting</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <a class="btn btn-success" data-toggle="modal" data-target=""> Isi Data <span class="fa fa-plus"></span></a>
              <a class="btn btn-primary" data-toggle="modal" data-target=""> Laporan <span class="fa fa-book"></span></a>
              <br>
              <br>
              <table id="yglain" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                <thead>
                  <tr style="background:#E0E0E0;">
                    <th>NO AKUN</th>
                    <th>NAMA AKUN</th>
                    <th>KETERANGAN</th>
                    <th>DEBET</th>
                    <th>KREDIT</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $selisih = 0; $debet = 0; $kredit = 0; ?>
                  @foreach($data as $row)
                  <tr>
                    <td>{{$row->no_akun}}</td>
                    <td>{{$row->akun->nama_akun}}</td>
                    <td>{{$row->keterangan}} {{$row->tgl_jurnal}}</td>
                    <td align="right">{{$row->debet}}</td>
                    <td align="right">{{$row->kredit}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>   
              <br>
              <br>           
              <div class="pull-left">
                <span>Selisih : </span><input type="text" class="form-grup" name="selisih" readonly="true" value="">
              </div>
              <div class="pull-right">
                <span>Saldo : </span><input type="text" class="form-grup" name="debet" readonly="true" value="">  <input type="text" class="form-grup" name="kredit" readonly="true" value="">
              </div>
            </div>
          </div>
          <!--  -->
        </div><!--end .card-body -->
      </div>
    </div>


  </div>
</div>

@endsection
