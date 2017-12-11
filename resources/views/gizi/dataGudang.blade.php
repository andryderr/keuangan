<!DOCTYPE html>
<html>
@extends('attr.footer')
@extends('gizi.head')

@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('gizi.sidebar')

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
           <li class="active">Gudang</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
         <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
          @endforeach
        </div> <!-- end .flash-message -->

        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Gudang</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahGudang"> <i class="glyphicon glyphicon-plus"></i> Tambah Gudang</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr style="background:#E0E0E0;">
                    <th>ID Gudang</th>
                    <th>Nama Gudang</th>
                    <th>Keterangan</th>
                    <th style="width=100px;">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr style="background:#E0E0E0;">
                     <th>ID Gudang</th>
                    <th>Nama Gudang</th>
                    <th>Keterangan</th>
                    <th style="width=100px;">Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                @foreach($data as $rows)
                  <tr>
                    <td>{{$rows->id_gudang}}</td>
                    <td>{{$rows->nama_gudang}}</td>
                    <td>{{$rows->keterangan}}</td>
                    <td>                          
                      <a href="#"><button type="button" data-toggle="modal" data-target="#editGudang" onclick="setModalEdit({{$rows->id_gudang}},'{{$rows->nama_gudang}}','{{$rows->keterangan}}');" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                      <a href="{{url('GIZI/hapusGudang')}}/{{$rows->id_gudang}}"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                      <!--  -->
                    </td>
                  </tr>
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
<script>
  function setModalEdit($idGudang, $namaGudang, $keterangan){
    document.getElementById('id_gudang').value = $idGudang;
    document.getElementById('nama_gudang').value = $namaGudang;
    document.getElementById('keterangan').value = $keterangan;
  }
</script>

@extends('gizi.mod_tambahGudang')
@extends('gizi.mod_editGudang')
</body>
</html>

