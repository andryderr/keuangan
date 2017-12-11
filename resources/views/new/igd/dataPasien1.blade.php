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
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->

        <br>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pasien {{Auth::user()->poli->nama_poli}}</h3>
              
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
                    <th>Action</th>
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
                    <td>{{$row->pendaftaran->kategori_usia}}</td>
                    <td>
                      <button href="#" data-toggle="popover" data-html="true" id="pop{{$row->id_pendaftaran}}" title="Pilihan" data-content="" onclick="over({{$row->id_pendaftaran.','.$row->id_detail_pendaftaran.','.$row->pendaftaran->no_rm}});" data-placement="left" class="btn btn-primary"><span class="fa fa-check"></span></button>
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
<div class="hidden" id="tester">
  <div class="pull-right" id="test">
    <a href="#" data-toggle="tooltip" title="Informasi Pasien"><button style="width: 37px;" id="a1" type="button" data-toggle="modal" data-target="#editPendaftaran" class="btn btn-info"><i class="fa fa-circle"></i></button></a>
    <a id="a2"  data-toggle="tooltip" title="Diagnosa & Tindakan Medis"><button type="button" style="width: 35px;" class="btn btn-success"><i class="fa fa-stethoscope"></i></button></a>
    <a id="a3"  data-toggle="tooltip" title="Riwayat Pasien"><button type="button" style="width: 37px;" class="btn btn-success"><i class="fa fa-clock-o"></i></button></a>
    @if(Auth::user()->poli->prefix == "RWINAP")
    <a id="a4"  data-toggle="tooltip" title="Kamar"><button type="button" style="width: 40px;" class="btn btn-primary"><i class="fa fa-bed"></i></button></a>
    @endif
    @if(Auth::user()->poli->kat_poli == "LAYANAN")
    <a id="a7"  data-toggle="tooltip" title="Pemeriksaan"><button type="button" style="width: 40px;" class="btn btn-primary">+</button></a>
    @endif
    <a id="a5"  data-toggle="tooltip" title="Cek Billing"><button type="button" style="width: 37px;" class="btn btn-success"><i class="fa fa-dollar"></i></button></a>
    <!-- <a id="a6"><button type="button" class="btn btn-success"><i class="fa fa-calendar-plus-o"></i></button></a> -->
    <!-- <a href="#"><button type="button" id="a6" style="width: 37px;" data-toggle="modal" data-target="#pasien_keluar" class="btn btn-warning"><i class="fa fa-sign-out"></i></button></a> -->
  </div>
</div>
<div class="hidden" id="tampil"></div>
<script>
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover({
      container:"body",
    });   
  });
  $('body').on('click', function (e) {
    $('[data-toggle=popover]').each(function () {
      if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
        $(this).popover('hide');
      }
    });
  });
  function over(id,id2,id3){
    $("#a1").attr('onclick',"setIsi("+id+");");
    $("#a2").attr('href',"{{url(Auth::user()->poli->prefix.'/dataPasien/diagnosaPasien1/')}}/"+id);
    $("#a3").attr('href',"{{url(Auth::user()->poli->prefix.'/dataPasien/riwayat/')}}/"+id3);
    $("#a4").attr('href',"{{url(Auth::user()->poli->prefix.'/dataPasien/utilitasKamar/')}}/"+id2);
    $("#a5").attr('href',"{{url(Auth::user()->poli->prefix.'/dataPasien/cetakBilling')}}/"+id);
    $("#a6").attr('href',"{{url(Auth::user()->poli->prefix.'/dataPasien/Pemeriksaan')}}/"+id);
    $("#a6").attr('onclick',"$('#id_detail_pendaftaran').val("+id2+")");
    $("#a7").attr('href',"{{url(Auth::user()->poli->prefix.'/dataPasien/Pemeriksaan/')}}/"+id)
    // $("#a7").attr("href","{{url(Auth::user()->poli->prefix.'/dataPasien/riwayat')}}/"+id3);
    $("#pop"+id).attr('data-content',$("#test").html());
  }
</script>
@endsection

</body>
</html>
@extends('new.igd.mod_pasien_keluar')
@extends('new.igd.mod_editDataPendaftaran')
@extends('new.igd.mod_rujuk')
@extends('new.igd.mod_editDataPasien')