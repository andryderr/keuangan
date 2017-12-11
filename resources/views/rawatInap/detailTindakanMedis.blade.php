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
         Halaman Setting Fee Tindakan Medis
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Pendaftaran</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="col xs-12">
         <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Tarif / Harga</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="text" class="form-control input-lg" placeholder="3.450.000" name="Harga" readonly="">
            </div>
          </div>
        </div>
      </div><!-- /.box-body -->

      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Jasa</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->


          <div class="box-body">

            <div class="form-group">
              <label>No/ID Tindakan Medis</label>
              <input type="text"  class="form-control" placeholder="" id="idTindakan" readonly name="idTindakanMedis">
            </div>

            <div class="form-group">
              <label>Nama Tindakan Medis</label>
              <input type="text"  class="form-control" id="namaTindakan" placeholder="" name="namaTindakanMedis" readonly>
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
            <h3 class="box-title">Jasa Rumah Sakit dan Pelaksana</h3>
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
                <table class="table table-hover">
                  <tr>
                    <th>Nama Jasa</th>
                    <th>Persentase</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                  <tr>
                    <td>Jasa Rumah Sakit</td>
                    <td>40%</td>
                    <td>1.200.000</td>
                    <td>
                     <a href="#"><button type="button" data-toggle="modal" data-target="#editPersen" class="btn btn-warning" onclick="setIsi('Jasa Rumah Sakit',40);"><i class="fa fa-edit"></i></button></a>
                   </td>
                 </tr>
                 <tr>
                  <td>Jasa Pelaksana</td>
                  <td>60%</td>
                  <td>1.350.000</td>
                  <td>
                   <a href="#"><button type="button" data-toggle="modal" data-target="#editPersen" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                 </td>
               </tr>
             </table>
           </div><!-- /.box-body -->
         </div><!-- /.box -->
       </div>
     </div> 
     </div>
     </div>


<!-- Detail Petugas -->
  <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Jasa Tindakan Petugas</h3>
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
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahPetugas"> <i class="glyphicon glyphicon-plus"></i> Tambah Detail Tindakan</a>
             </form>
                <table class="table table-hover">
                  <tr>
                    <th>Nama Petugas</th>
                    <th>Persentase</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                  <tr>
                    <td>Dokter</td>
                    <td>100%</td>
                    <td>1.500.000</td>
                    <td>
                     <a href="#"><button type="button" data-toggle="modal" data-target="#editPersenPetugas" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                   </td>
                 </tr>
                 <tr>
                  <td>Perawat 1</td>
                  <td>10%</td>
                  <td>150.000</td>
                  <td>
                   <a href="#"><button type="button" data-toggle="modal" data-target="#editPersenPetugas" onclick="setIsiPetugas('Perawat 1',10);" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                 </td>
               </tr>
               <tr>
                  <td>Perawat 2</td>
                  <td>10%</td>
                  <td>150.000</td>
                  <td>
                   <a href="#"><button type="button" data-toggle="modal" data-target="#ubahPersen" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                 </td>
               </tr>
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
<script>
  function setIsi($a,$b){
    document.getElementById('namaJasa').value = $a;
    document.getElementById('persentaseJasa').value = $b;
  }
</script>

<script>
  function setIsiPetugas($a,$b){
    document.getElementById('jenisPetugas').value = $a;
    document.getElementById('persentasePetugas').value = $b;
  }
</script>
</body>
@extends('rawatInap.mod_tambahDetailTindakan')
@extends('rawatInap.mod_persentaseJasaRS')
@extends('rawatInap.mod_persentasePetugas')