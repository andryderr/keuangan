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
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahPetugasMedis"> <i class="glyphicon glyphicon-plus"> Tambah Petugas Medis</i></a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th style="width=100px;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Susi</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>                          
                      <a href="#"><button type="button" data-toggle="modal" data-target="#editPetugasMedis" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                      <a href="#"><button type="button" onclick="return confirm('Hapus Data Pegawai ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>                          
                      <a href="#"><button type="button" data-toggle="modal" data-target="#editPetugasMedis" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                      <a href="#"><button type="button" onclick="return confirm('Hapus Data ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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

@extends('rawatInap.mod_tambahDataTenagaMedis')
@extends('rawatInap.mod_editDataTenagaMedis')