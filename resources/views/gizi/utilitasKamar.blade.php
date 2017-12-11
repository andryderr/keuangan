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
         Halaman Utilitas Kamar
         <small>Control panel</small>
       </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pasien</li>
        <li class="active">Utilitas Kamar</li>
      </ol>
    </section>

    <div class="container-fluid">

     <!-- Main content -->
     <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="col-md-4">
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
              <label>No/ID Transaksi</label>
              <input type="text"  class="form-control" placeholder="" readonly name="" id="">
            </div>

            <div class="form-group">
              <label>No/ID Rekam Medis</label>
              <input type="text"  class="form-control" placeholder="" readonly name="" id="">
            </div>

            <div class="form-group">
              <label>Nama  Pasien</label>
              <input type="text"  class="form-control" placeholder="" name="" id="" readonly>
            </div>

            <div class="form-group">
              <label>No Kamar</label>
              <input type="text"  class="form-control" placeholder="" name="" id="" readonly>
            </div>

            <div class="form-group">
              <label>Tanggal Masuk</label>
              <input type="text"  class="form-control" placeholder="" name="" id="" readonly>
            </div>
            <br>
          </div><!-- /.box-body -->
        </div>
      </div>

      <!-- Detail harga -->
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Riwayat Kamar</h3>
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
                 <table class="table table-hover">
                  <tr>
                    <th>ID Kamar</th>
                    <th>Nama Kamar</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Status</th>
                  </tr>
                  <tr>
                    <td>KM801</td>
                    <td>Dahlia 1</td>
                    <td>12-05-2017 12.13</td>
                    <td>17-05-2017 14.13</td>
                    <td>
                     <a href="#"><button type="button" class="btn btn-danger" style="width:80px">Pindah</button></a>
                   </tr>
                   <tr>
                    <td>KM801</td>
                    <td>Dahlia 1</td>
                    <td>12-05-2017 12.13</td>
                    <td>17-05-2017 14.13</td>
                    <td>
                     <a href="#"><button type="button" class="btn btn-primary"  style="width:80px">Aktif</button></a>
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

     <!-- Rekomendasi Gizi -->
     <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Rekomendasi Gizi</h3>
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
            <table id="example" class="table table-hover">
              <tr id="header">
                <th>ID</th>
                <th>Makanan Rekom</th>
                <th>Tanggal Rekom</th>
                <th>Makanan Distribusi</th>
                <th>Tanggal Distribusi</th>
                <th>Aksi</th>
              </tr>
              <tr>
                <td>mk23</td>
                <td>Sop Bening</td>
                <td>12/01/2017 08.29</td>
                <td>Sop Ayam</td>
                <td>12/01/2017 08.45</td>
                <td>
                 <a><button type="button" class="btn btn-danger"><i>Gagal Distribusi</i></button></a>
               </td>
             </tr>
             <tr>
              <td>mk23</td>
              <td>Sop Bening</td>
              <td>12/01/2017 08.29</td>
              <td>Sop Ayam</td>
              <td>12/01/2017 08.45</td>
              <td>
               <a><button type="button" class="btn btn-success"><i>Berhasil Distribusi</i></button></a>
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
</section>
</div>
</div>
@endsection

</body>
