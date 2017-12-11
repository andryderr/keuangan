
@extends('attr.footer')
@extends('new.personalia.head')

@extends('attr.header')

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
          <li class="active">Departement</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Departement</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
             <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahDepartement"> <i class="glyphicon glyphicon-plus"></i> Tambah Departement</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Departement</th>
                  <th>Jam Kerja</th>
                  <th>Jam Berkunjung</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Departement</th>
                  <th>Jam Kerja</th>
                  <th>Jam Berkunjung</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <?php $no=1; ?>
                  <td>{{$no++}}</td>
                  <td>Poli Anak</td>
                  <td>08.00 - 21.00</td>
                  <td>08.00 - 17.00 , 19.00 - 21.00</td>
                  <td>                          
                  <a href="#"><button type="button" data-toggle="modal" data-target="#editDepartement" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                    <a href="#"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>
                <tr>
                  <td>{{$no++}}</td>
                  <td>Keuangan</td>
                  <td>08.00 - 17.00</td>
                  <td>08.00 - 12.00 , 13.00 - 16.00</td>
                  <td>                          
                  <a href="#"><button type="button" data-toggle="modal" data-target="#editDepartement" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
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

@extends('new.personalia.mod_tambahDataPoli')
@extends('new.personalia.mod_editDataPoli')
@endsection
