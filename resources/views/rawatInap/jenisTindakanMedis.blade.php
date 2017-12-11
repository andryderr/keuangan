<!DOCTYPE html>
<html>
@extends('attr.footer')
@extends('rawatInap.head')

@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('rawatInap.sidebar')

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
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Jenis Tindakan Medis</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahTindakanMedis"> <i class="glyphicon glyphicon-plus"></i> Tambah Jenis Tindakan Medis</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>ID tindakan</th>
                  <th>Nama Tindakan Medis</th>
                  <th>Harga</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                  <th>ID tindakan</th>
                  <th>Nama Tindakan Medis</th>
                  <th>Harga</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row -> id_tm_d_p}}</td>
                  <td>{{$row -> nama}}</td>
                  <td>{{$row -> harga}}</td>
                  <td>                          
                    <a href="/RWINAP/detailTindakanMedis"><button type="button" class="btn btn-primary"><i class="fa fa-sticky-note-o"></i></button></a>
                    <a href="#"><button type="button" data-toggle="modal" data-target="#editTindakanMedis" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                    <a href="#"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>
                @endForeach
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

@extends('rawatInap.mod_tambahJenisTindakanMedis')
@extends('rawatInap.mod_editJenisTindakanMedis')