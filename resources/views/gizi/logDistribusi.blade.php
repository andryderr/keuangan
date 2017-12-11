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
          <li class="active">Riwayat Distribusi</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Filter Pencarian</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <!-- form start -->


            <div class="box-body">
              <div class="form-group col-md-6">
                <label>Tanggal</label>
                <input type="search" data-table="table table-striped table-bordered"  class="form-control" placeholder="" name="" id="tanggalwaktusearch">
              </div>

              <div class="form-group col-md-6">
                <label>Cari</label>
                <input type="search"  data-table="table table-striped table-bordered" class="form-control" placeholder="" name="" id="">
              </div>
              <br>
            </div><!-- /.box-body -->
          </div>
        </div>


        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a href="#pagi" data-toggle="tab">Pagi</a></li>
              <li><a href="#siang" data-toggle="tab">Siang</a></li>
              <li><a href="#malam" data-toggle="tab">Malem</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="pagi">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Riwayat Sajian Pagi ini</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">

                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr style="background:#E0E0E0;">
                          <th>ID Dist.</th>
                          <th>Nama Pasien</th>
                          <th>Nama Makanan</th>
                          <th>Ruang</th>
                          <th>Tanggal Distribusi</th>
                          <th>Pegawai</th>
                          <th style="width:100px;">Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr style="background:#E0E0E0;">
                          <th>ID Dist.</th>
                          <th>Nama Pasien</th>
                          <th>Nama Makanan</th>
                          <th>Ruang</th>
                          <th>Tanggal Distribusi</th>
                          <th>Pegawai</th>
                          <th style="width:100px;">Aksi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Sofyan</td>
                          <td>Pecel</td>
                          <td>Dahlia 1</td>
                          <td></td>
                          <td>Sopian</td>
                          <td>                          
                            <a href=""><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Gagal Distribusi</button></a>
                          </td>
                        </tr>
                        <tr>
                         <td>1</td>
                         <td>Iqbal</td>
                         <td>Pecel</td>
                         <td>Dahlia 1</td>
                         <td>12-12-2016 8:30</td>
                         <td>Sopian</td>
                         <td>                          
                          <a href=""><button type="button" class="btn btn-success"><i class="fa fa-check"></i> Berhasil Distribusi</button></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div><!--end .card-body -->
            </div>

            <div class="tab-pane" id="siang">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Riwayat Sajian Siang ini</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr style="background:#E0E0E0;">
                      <th>ID Dist.</th>
                      <th>Nama Pasien</th>
                      <th>Nama Makanan</th>
                      <th>Ruang</th>
                      <th>Tanggal Distribusi</th>
                      <th>Pegawai</th>
                      <th style="width:100px;">Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr style="background:#E0E0E0;">
                      <th>ID Dist.</th>
                      <th>Nama Pasien</th>
                      <th>Nama Makanan</th>
                      <th>Ruang</th>
                      <th>Tanggal Distribusi</th>
                      <th>Pegawai</th>
                      <th style="width:100px;">Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Sofyan</td>
                      <td>Pecel</td>
                      <td>Dahlia 1</td>
                      <td></td>
                      <td>Sopian</td>
                      <td>                          
                        <a href=""><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Berhasil Distribusi</button></a>
                      </td>
                    </tr>
                    <tr>
                     <td>1</td>
                     <td>Iqbal</td>
                     <td>Pecel</td>
                     <td>Dahlia 2</td>
                     <td>12-12-2016 8:35</td>
                     <td>Sopian</td>
                     <td>                          
                      <a href=""><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Gagal Distribusi</button></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div><!--end .card-body -->
        </div>

        <div class="tab-pane" id="malam">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Sajian Malam ini</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr style="background:#E0E0E0;">
                    <th>ID Dist.</th>
                    <th>Nama Pasien</th>
                    <th>Nama Makanan</th>
                    <th>Ruang</th>
                    <th>Tanggal Distribusi</th>
                    <th>Pegawai</th>
                    <th style="width:100px;">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr style="background:#E0E0E0;">
                    <th>ID Dist.</th>
                    <th>Nama Pasien</th>
                    <th>Nama Makanan</th>
                    <th>Ruang</th>
                    <th>Tanggal Distribusi</th>
                    <th>Pegawai</th>
                    <th style="width:100px;">Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Sofyan</td>
                    <td>Pecel</td>
                    <td>Dahlia 1</td>
                    <td>12-12-2016 8:35</td>
                    <td>Sopian</td>
                   <td>                          
                        <a href=""><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Berhasil Distribusi</button></a>
                      </td>
                    </tr>
                    <tr>
                     <td>1</td>
                     <td>Iqbal</td>
                     <td>Pecel</td>
                     <td>Dahlia 2</td>
                     <td>12-12-2016 8:35</td>
                     <td>Sopian</td>
                     <td>                          
                      <a href=""><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Gagal Distribusi</button></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div><!--end .card-body -->
        </div>

      </div>
    </div>
  </div>
</section>
</div>
</div>
</div>        


@endsection

</body>
</html>

@extends('gizi.mod_tambahGudang')
@extends('gizi.mod_editGudang')