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
          <li><a href="#">Data Kelas</a></li>
           <li class="active">Data Kamar</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Keberadaan Kamar</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            
              <table id="example" class="table table-striped table-bordered" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Kelas</th>
                    <th>Kelas</th>
                    <th>Status Tersedia</th>
                    <th>Harga</th>
                    <th style="width=200px;">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nama Kelas</th>
                    <th>Kelas</th>
                    <th>Status Tersedia</th>
                    <th>Harga</th>
                    <th style="width=200px;">Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>km01</td>
                    <td>Dahlia</td>
                    <td>Kelas A</td>
                    <td>59 Kamar</td>
                    <td>Rp 1.500.000/hari</td>
                    <td>                          
                      <a href="#"><button type="button" data-toggle="modal" data-target="#editKamar" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                      <a href="#"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </tr>
                  <tr>
                    <td>km23</td>
                    <td>Mawar</td>
                    <td>Kelas B</td>
                    <td>60 Kamar</td>
                    <td>Rp 500.000/hari</td>
                    <td>                          
                      <a href="#"><button type="button" data-toggle="modal" data-target="#editKamar" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                     <a href="#"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
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

@extends('rawatInap.mod_tambahKamar')
@extends('rawatInap.mod_editKamar')