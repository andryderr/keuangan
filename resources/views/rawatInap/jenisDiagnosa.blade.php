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
              <h3 class="box-title">Data Jenis Diagnosa</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahDiagnosa"> <i class="glyphicon glyphicon-plus"></i> Tambah Jenis Diagnosa</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr style="background:#E0E0E0;">
                    <th>ID</th>
                    <th>Nama Diagnosa</th>
                    <th>Keterangan</th>
                    <th style="width=100px;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr style="background:#E0E0E0;">
                    <th>ID</th>
                    <th>Nama Diagnosa</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                    <td>{{$row -> id_diagnosa}}</td>
                    <td>{{$row -> nama}}</td>
                    <td>{{$row -> keterangan}}</td>
                    <td>                          
                      <a href="#"><button type="button" data-toggle="modal" data-target="#editDiagnosa" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
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

@extends('rawatInap.mod_tambahJenisDiagnosa')
@extends('rawatInap.mod_editJenisDiagnosa')