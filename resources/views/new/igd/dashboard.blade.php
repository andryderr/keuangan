<!DOCTYPE html>
<html>
@extends('new.attr.sidebar');
@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
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
       <section class="content">
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
          @endforeach
        </div> <!-- end .flash-message -->
        <div class="col-md-12">

        <div class="row  wow bounceInDown">
          
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-area-chart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pasien Hari Ini</span>
                <span class="info-box-number">{{$masuk}}</span>
                <a href="#" class="small-box-footer" >More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-area-chart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pasien Dirawat</span>
                <span class="info-box-number">{{$dirawat}}</span>
                <a href="#" data-toggle="modal" data-target="#modpasienRWinap" class="small-box-footer" onclick="dataPasien();">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-area-chart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pasien Keluar</span>
                <span class="info-box-number">{{$keluar}}</span>
                <a href="{{url(Auth::user()->poli->nama_poli.'/dataPasien/pasienKeluar')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-area-chart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pasien Dirujuk</span>
                <span class="info-box-number">{{$dirujuk}}</span>
                <a href="/FARMASI/dataObat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
        </div><!-- /.row -->

          <div class="box  wow fadeInUp">
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
                      <th>Tanggal Masuk</th>
                      <th>Kategori Usia</th>
                      <th style="width:80;">Action</th>
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
                    <th>Tanggal Masuk</th>
                    <th>Kategori Usia</th>
                    <th style="width:80px;">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($data as $row)
                  
                  <tr>
                    <td>{{$row->id_pendaftaran}}</td>
                    <td>{{$row->pendaftaran->pasien->no_rm}}</td>
                    <td>{{$row->pendaftaran->pasien->nama}}</td>
                    <td>{{$row->pendaftaran->pasien->tanggal_lahir}}</td>
                    <td>{{$row->pendaftaran->umur}}</td>
                    <td>{{$row->pendaftaran->tanggal_daftar}}</td>
                    <td>{{$row->pendaftaran->kategori_usia}}</td>
                    <td>                          
                      <a href="#" data-toggle="tooltip" title="Info dan Edit Data Pendaftaran"><button type="button" data-toggle="modal" data-target="#editPendaftaran" onclick="setIsi({{$row->id_pendaftaran}});" class="btn btn-info"><i class="fa fa-circle"></i></button></a>
                      @if(Auth::user()->poli->prefix != 'PENDAF')
                      <a href="#" data-toggle="tooltip" title="Verifikasi Pilih Dokter"><button type="button" data-toggle="modal" data-target="#pilihDokter" class="btn btn-primary" onclick="$('#id_detail_pendaftaran_pilih_dokter').val('{{$row->id_detail_pendaftaran}}');"><i class="fa fa-check-square-o"></i></button></a>
                      @endif
                      <a href="#" data-toggle="tooltip" title="Cetak Gelang No Antrian"><button type="button" data-toggle="modal" data-target="#cetak" class="btn btn-success" onclick="yesCetak('{{$row->id_detail_pendaftaran}}');"><i class="fa fa-print"></i></button></a>
                      <!-- <a href="#"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a> -->
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
  function yesCetak(id){
      $('#cetakGelangku').attr('href',"{{url('CETAK/cetakGelang/')}}/"+id);
      $('#cetakAntrianku').attr('href',"{{url('CETAK/cetakAntrian/')}}/"+id);
  }
  function dataPasien(){
    var view_url = "{{url('G/RWINAP/pasienRWinap')}}";
    $.getJSON(view_url,function(result){
      $("#pasienRWinap").empty();
      result.forEach(function(r){
       $("#pasienRWinap").append("<tr><td>"+r['id_detail_pendaftaran']+"</td><td>"+r['no_rm']+"</td><td>"+r['namapasien']+"</td><td>"+r['umur']+"</td><td>"+r['nama_kelas']+"</td><td>"+r['nama_ruang']+"</td><td>"+r['nama']+"</td></tr>");
     });
    });
  }
</script>
</body>
</html>
@extends('new.igd.mod_pilih_dokter')
@extends('new.igd.mod_editDataPendaftaran')
@extends('new.igd.mod_cetak')
@extends('rawatInap.mod_pasienRWinap')
