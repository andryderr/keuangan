<!DOCTYPE html>
<html>
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
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{$totalpasien[0]->totalpasien}}</h3>
                <p>Pendaftaran Rawat Inap</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{$pasiendirawat[0]->pasiendirawat}}</h3>
                <p>Pasien Dirawat</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#modpasienRWinap" class="small-box-footer" onclick="dataPasien();">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$pasienmasuk[0]->pasienmasuk}}</h3>
                <p>Pasien Menunggu</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{$totalkamar[0]->totalkamar}}</h3>
                <p>Data Kamar</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#dataKamar" class="small-box-footer" onclick="ketersediaanKamar();">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
        </div><!-- /.row -->
        <div class="col-md-12">
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
                      <th style="width:200px;">Action</th>
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
                    <th style="width:200px;">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                    <td>{{$row->id_pendaftaran}}</td>
                    <td>{{$row->pasien->no_rm}}</td>
                    <td>{{$row->pasien->nama}}</td>
                    <td>{{$row->pasien->tanggal_lahir}}</td>
                    <td>{{$row->umur}}</td>
                    <td>{{$row->kategori_usia}}</td>
                    <td>                          
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pilihKamar" onclick="setModal('{{$row->id_pendaftaran}}','{{$row->pasien->nama}}', '{{$row->id_detail_pendaftaran}}')"><i class="fa fa-bed"></i></button>
                       <!-- <a href="#"><button type="button" data-toggle="modal" data-target="#cetak" class="btn btn-success"><i class="fa fa-print"></i></button></a> -->
                      <a href="#"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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


<script>
  // function pilihKamar(id)
  // {
  //   var view_url = "{{url('RWINAP/jsonPilihKamar')}}";
  //   $.ajax({
  //     url: view_url,
  //     type:"GET",
  //     data: {"id":id},
  //     success: function(result){
  //       result.forEach(function(r){
  //         // alert(r['id_pendaftaran']);
  //         $('#id_pendaftaran').val(r.id_pendaftaran);
  //         $('#nama_pasien').val(r.nama_pasien);
  //         $('#id_detail').val(r.id_detail_pendaftaran);
  //       });
  //     }});
  // }
  function setModal ($id_pendaftaran, $nama, $id_detail_pendaftaran) {
    document.getElementById('id_pendaftaran').value = $id_pendaftaran;
    document.getElementById('nama_pasien').value = $nama;
    document.getElementById('id_detail').value = $id_detail_pendaftaran;
  }
</script>
<script type="text/javascript">
  function ketersediaanKamar()
  {
    var view_url = "{{url('G/RWINAP/dataKamar')}}";
    $.getJSON(view_url,function(result){
         // console.log(result);
         $("#gantien").empty();
         result.forEach(function(r){
        // alert(r['id_kamar']);
        if ((r['status']) == 0) {
          $status = "Kosong";
        } else if ((r['status']) == 1) {
          $status = "Terisi";
        } else {
          $status = "Sedang dalam Perbaikan";
        }
        $("#gantien").append("<tr><td>"+r['id_kamar']+"</td><td>"+r['nama_kelas']+"</td><td>"+r['nama_ruang']+"</td><td>"+r['nama']+"</td><td>"+r['harga']+"</td><td>"+$status+"</td></tr>");
      });
    });
  }
</script>
<script>
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
@extends('rawatInap.mod_dataKamar')
@extends('rawatInap.mod_editDataPendaftaran')
@extends('rawatInap.mod_cetak')
@extends('rawatInap.mod_pilihKamar')
@extends('rawatInap.mod_pasienRWinap')

@endsection

</body>
</html>
