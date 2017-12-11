<!DOCTYPE html>
<html>
@extends('new.attr.footer')
@extends('new.personalia.head')

@extends('new.attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('new.personalia.sidebar')

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
          <li class="active">Tenaga Medis</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Petugas Medis</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahPetugasMedis"> <i class="glyphicon glyphicon-plus"></i> Tambah Petugas Medis</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                    <th>ID Petugas</th>
                    <th>Nama</th>
                    <th>SIP</th>
                    <th>Tanggal Berlaku</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Bagian</th>
                    <th style="width=100px;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID Petugas</th>
                    <th>Nama</th>
                    <th>SIP</th>
                    <th>Tanggal Berlaku</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Bagian</th>
                    <th style="width=100px;">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($petugas as $row)
                  <tr>
                    <td>{{$row->id_petugas_medis}}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->sip}}</td>
                    <td>{{$row->tgl_awal_sip}}</td>
                    <td>{{$row->tgl_akhir_sip}}</td>
                    <td>{{$row->job->nama_job}}</td>
                    <td>                          
                      <a href="#"><button type="button" data-toggle="modal" data-target="#editPetugasMedis" class="btn btn-warning" onclick="edit({{$row->id_petugas_medis}});"><i class="fa fa-edit"></i></button></a>
                      <a href="{{url('PERSONALIA/Petugas/Hapus/')}}/{{$row->id_petugas_medis}}" onclick="return confirm('Hapus Data Ini ?');" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
@extends('new.personalia.mod_tambahDataTenagaMedis')
@extends('new.personalia.mod_editDataTenagaMedis')
<script>
  function getTanggal(tgl_awal,tgl_akhir){
    return tgl_awal+'-'+tgl_akhir;
  }
  function edit(id){
    url = "{{url('G/Petugas/show')}}/"+id;
    // alert(url);
    $.getJSON(url,function(result){
      console.log(result);
      $('#alamat').val(result[0]['alamat']);
      $('#id_petugas_medis').val(result[0]['id_petugas_medis']);
      $('#id_job_petugas').val(result[0]['id_job_petugas']);
      $('#nama').val(result[0]['nama']);
      $('#sip').val(result[0]['sip']);
      $('#tanggal_masuk').val(result[0]['tanggal_masuk']);
      $('#rangetanggal').val(getTanggal(result[0]['tgl_awal_sip'],result[0]['tgl_akhir_sip']));
    });
  }

</script>
@endsection

</body>
</html>
