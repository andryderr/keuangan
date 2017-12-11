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
          <li><a href="/RWINAP/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
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
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahDokter"> <i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID Dokter</th>
                  <th>Nama</th>
                  <th>SIP</th>
                  <th>Tanggal Berlaku</th>
                  <th>Tanggal Kadaluarsa</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </thead>
              
              <tfoot>
                <tr>
                  <th>ID Dokter</th>
                  <th>Nama</th>
                  <th>SIP</th>
                  <th>Tanggal Berlaku</th>
                  <th>Tanggal Kadaluarsa</th>
                  <th>Sebagai</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($dokter as $row)
                <tr>
                  <td>{{$row->id_dokter}}</td>
                  <td>{{$row->nama}}</td>
                  <td>{{$row->sip}}</td>
                  <td>{{$row->tgl_awal_sip}}</td>
                  <td>{{$row->tgl_akhir_sip}}</td>
                  <td>{{$row->job->nama_job}}</td>
                  <td>                          
                    <a href="#"><button type="button" data-toggle="modal" data-target="#editDokter" class="btn btn-warning" onclick="edit({{$row->id_dokter}});"><i class="fa fa-edit"></i></button></a>
                    <button type="button" onclick="aktivitas('{{$row->id_dokter}}');" class="btn btn-primary" data-toggle="modal" data-target="#mod_periode">
                      Aktivitas
                    </button>
                    <a href="{{url('PERSONALIA/Dokter/Hapus/')}}/{{$row->id_dokter}}" onclick="return confirm('Hapus Data Ini ?');" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
  function getTanggal(tgl_awal,tgl_akhir){
    return tgl_awal+'-'+tgl_akhir;
  }
  function edit(id){
    url = "{{url('G/Dokter/show')}}/"+id;
    // alert(url);
    $.getJSON(url,function(result){
      console.log(result);
      $('#alamat').val(result[0]['alamat']);
      $('#id_dokter').val(result[0]['id_dokter']);
      $('#id_job_dokter').val(result[0]['id_job_dokter']);
      $('#nama').val(result[0]['nama']);
      $('#sip').val(result[0]['sip']);
      $('#tanggal_masuk').val(result[0]['tanggal_masuk']);
      $('#rangetanggal').val(getTanggal(result[0]['tgl_awal_sip'],result[0]['tgl_akhir_sip']));
      // alert(getTanggal(result[0]['tgl_awal_sip'],result[0]['tgl_akhir_sip']));
    });
  }
  function aktivitas(a){
    url = "{{url(Auth::user()->poli->prefix.'/Aktivitas/Dokter/')}}";
    $("#form_periode").attr("action",url);
    $("#id").val(a);
  }

</script>

@endsection

</body>
</html>

@extends('new.personalia.mod_tambahDataDokter')
@extends('new.personalia.mod_editDataDokter')
@extends('new.personalia.mod_periode')