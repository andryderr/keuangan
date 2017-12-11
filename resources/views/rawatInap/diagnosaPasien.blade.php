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
         Halaman Tindakan Medis dan Diagnosa Pasien
         <small>Control panel</small>
       </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pasien</li>
        <li class="active">Diagnosa</li>
      </ol>
    </section>

    <div class="container-fluid">

     <!-- Main content -->
     <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Pasien</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->


          <div class="box-body">

            <div class="form-group">
              <label>No/ID Pendaftaran</label>
              <input type="text"  class="form-control" value="{{$data[0]->id_pendaftaran}}" readonly name="id_pendaftaran" id="id_pendaftaran">
            </div>

            <div class="form-group">
              <label>No/ID Rekam Medis</label>
              <input type="text"  class="form-control" value="{{$data[0]->no_rm}}" readonly name="no_rm" id="no_rm">
            </div>

            <div class="form-group">
              <label>Nama  Pasien</label>
              <input type="text"  class="form-control" value="{{$data[0]->nama}}" name="namaPasien" readonly>
            </div>

            <div class="form-group">
              <label>Keluhan</label>
              <textarea rows="3" class="form-control" placeholder="" name="namaPasien" readonly></textarea>
            </div>
            <br>
          </div><!-- /.box-body -->
        </div>
      </div>

      <!-- Detail harga -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Rujukan</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">

            <!-- Rujukan -->

            <div class="box-body">
             <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
                   <a href="#"><button type="button" data-toggle="modal" data-target="#tambahRUjukan" class="btn btn-primary"><i class="fa fa-ambulance"></i> Tambah Rujukan</button></a>
                 </form>
                 <table class="table table-hover">
                  <tr>
                    <th>ID Rujukan</th>
                    <th>Nama Rujukan</th>
                    <th>Tanggal/Jam Rujukan</th>
                    <th>Aksi</th>
                  </tr>
                  <tr>
                    <td>DS12324</td>
                    <td>Poli Anak</td>
                    <th>12/12/2017 12.30AM</th>
                    <td>
                     <a href="#"><button type="button" data-toggle="modal" data-target="#lihatMemo" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                   </td>
                 </tr>
                 <tr>
                 </table>
               </div><!-- /.box-body -->
             </div><!-- /.box -->
           </div>
         </div><!-- /.box-body -->   
       </div>
     </div>
     </div>

     <!-- Tindakan Medis -->
     <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tindakan Medis</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
         <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
              </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#pilihTindakan"> <i class="glyphicon glyphicon-plus"></i> Tambah Tindakan Medis</a>
             </form>
             <table class="table table-hover">
              <tr>
                <th>ID Tindakan Medis</th>
                <th>Nama Tindakan</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
              <tr>
                <td>OP12324</td>
                <td>Operasi Besar</td>
                <td>1.500.000</td>
                <td>
                 <a href="#"><button type="button" data-toggle="modal" data-target="#pilihTindakan" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                 <a href="/RWINAP/dataPasien/feeTindakanMedis"><button type="button" class="btn btn-warning"><i class="fa fa-gear"></i></button></a>
               </td>
             </tr>
             <tr>
             </table>
           </div><!-- /.box-body -->
         </div><!-- /.box -->
       </div>
     </div> 
   </div>
 </div>

 <!-- Diagnosa -->
 <div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Diagnosa</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div><!-- /.box-header -->
    <!-- form start -->

    <div class="box-body">
     <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
          </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
           <a class="btn btn-success btn-md" data-toggle="modal" data-target="#pilihDiagnosa"> <i class="glyphicon glyphicon-plus"></i> Tambah Diagnosa</a>
         </form>
         <table class="table table-hover">
          <tr>
            <th>ID Diagnosa</th>
            <th>Nama Diagnosa</th>
            <th>Aksi</th>
          </tr>
          <tr>
            <td>DS12324</td>
            <td>Tifus</td>
            <td>
             <a href="#"><button type="button" data-toggle="modal" data-target="#editPersenPetugas" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
           </td>
         </tr>
         <tr>
         </table>
       </div><!-- /.box-body -->
     </div><!-- /.box -->
   </div>
 </div> 
</div>
</div>


</section>
</div>
</div>
@endsection

</body>
@extends('rawatInap.mod_pilihTindakanMedis')
@extends('rawatInap.mod_pilihDiagnosa')
@extends('rawatInap.mod_lihatMemo')
@extends('rawatInap.mod_tambahRujukan')
@extends('rawatInap.mod_tambahGizi')