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
          <li><a href="/UTILITAS/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Poli</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Departemen</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahPoli" onclick="tambah();"> <i class="glyphicon glyphicon-plus"></i> Tambah Departemen</a>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID Poli</th>
                  <th>Nama Poli</th>
                  <th>Jam Kerja</th>
                  <th>Jam Kunjung</th>
                  <th>prefix</th>
                  <th>Kategori</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID Poli</th>
                  <th>Nama Poli</th>
                  <th>Jam Kerja</th>
                  <th>Jam Kunjung</th>
                  <th>prefix</th>
                  <th>Kategori</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id_poli}}</td>
                  <td>{{$row->nama_poli}}</td>
                  <td>{{$row->jam_kunjung1.'-'.$row->jam_kunjung2}}</td>
                  <td>{{$row->jam_kerja1.'-'.$row->jam_kerja1}}</td>
                  <td>{{$row->prefix}}</td>
                  <td>{{$row->kat_poli}}</td>
                  <td width="23%">
                    <!-- <a href="{{url('PERSONALIA/Poli/Dokter')}}/{{$row->id_poli}}" class="btn btn-default"><i class="fa fa-user-secret"></i></a>
                    <a href="{{url('PERSONALIA/Poli/Petugas')}}/{{$row->id_poli}}" class="btn btn-default"><i class="fa fa-user"></i></a> -->
                    <a href="{{url('PERSONALIA/Poli/detail')}}/{{$row->id_poli}}" class="btn btn-info"><i class="fa fa-user"></i></a>                          
                    <a href="#"><button type="button" data-toggle="modal" data-target="#tambahPoli" class="btn btn-warning" onclick="edit({{$row->id_poli}},'{{$row->nama_poli}}','{{$row->jam_kerja1}}','{{$row->jam_kunjung1}}','{{$row->jam_kerja2}}','{{$row->jam_kunjung2}}','{{$row->prefix}}','{{$row->kat_poli}}');"><i class="fa fa-edit"></i></button></a>
                    <a href="{{url('PERSONALIA/Poli/hapus/')}}/{{$row->id_poli}}" onclick="return confirm('Hapus Data Ini ?');" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
  function edit(id,nama,jam_kerja1,jam_kunjung1,jam_kerja2,jam_kunjung2,prefix,kat_poli){
    $('#myForm').attr('action',"{{url('PERSONALIA/Poli/update')}}");
    $('#id_poli').val(id);
    $('#nama_poli').val(nama);
    $('#jam_kerja1').val(jam_kerja1);
    $('#jam_kunjung1').val(jam_kunjung1);
    $('#jam_kerja2').val(jam_kerja2);
    $('#jam_kunjung2').val(jam_kunjung2);
    $('#prefix').val(prefix);    
    $('#kat_poli').val(kat_poli);
  }
  function tambah(){
    $('#myForm').attr('action',"{{url('PERSONALIA/Poli/tambah')}}");
    $('#id_poli').val("");
    $('#nama_poli').val("");
    $('#jam_kerja1').val("");
    $('#jam_kunjung1').val("");
    $('#jam_kerja2').val("");
    $('#jam_kunjung2').val("");
    $('#prefix').val("");
    $("#kat_poli").val("");
  }
</script>

@endsection

</body>
</html>

@extends('new.utilitas.mod_tambahDataPoli')