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
          <li class="active">Rekom Sajian</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
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
                    <h3 class="box-title">Data Rekomendasi Sajian Pagi ini</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                   <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr style="background:#E0E0E0;">
                        <th>No</th>
                        <th>Tanggal Rekom</th>
                        <th>Nama Makanan Rekom</th>
                        <th>Jumlah</th>
                        <th style="width:100px;">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr style="background:#E0E0E0;">
                       <th>No</th>
                       <th>Tanggal Rekom</th>
                       <th>Nama Makanan Rekom</th>
                       <th>Jumlah</th>
                       <th style="width:100px;">Aksi</th>
                     </tr>
                   </tfoot>
                   <tbody>
                    <?php $id = 1; ?>
                    @foreach($rekomPagi as $rp)
                    <tr>
                      <td>{{$id++}}</td>
                      <td>{{$rp->tgl}}</td>
                      <td>{{$rp->jenis_barang}}</td>
                      <td>{{$rp->banyak}}</td>
                      <td>                    
                        @if($rp->jumlah >= $rp->banyak)
                        <a href="#"><button type="button" class="btn btn-primary"><i class="fa fa-cutlery"></i> Stok Tersedia</button></a>
                        @elseif($rp->jumlah <= $rp->banyak)
                        <a href="/GIZI/jenisSajian"><button type="button" class="btn btn-danger"><i class="fa fa-cutlery"></i> Stok Kosong</button></a>
                        @endif
                      </td>
                    </tr>
                    @endForeach
                  </tbody>
                </table>
              </div>
            </div><!--end .card-body -->
          </div>

          <div class="tab-pane" id="siang">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Rekomendasi Sajian Siang ini</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
               <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr style="background:#E0E0E0;">
                    <th>No</th>
                    <th>Tanggal Rekom</th>
                    <th>Nama Makanan Rekom</th>
                    <th>Jumlah</th>
                    <th style="width:100px;">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr style="background:#E0E0E0;">
                   <th>No</th>
                   <th>Tanggal Rekom</th>
                   <th>Nama Makanan Rekom</th>
                   <th>Jumlah</th>
                   <th style="width:100px;">Aksi</th>
                 </tr>
               </tfoot>
               <tbody>
                <?php $id = 1; ?>
                @foreach($rekomSiang as $rp)
                <tr>
                  <td>{{$id++}}</td>
                  <td>{{$rp->tgl}}</td>
                  <td>{{$rp->jenis_barang}}</td>
                  <td>{{$rp->banyak}}</td>
                  <td>                          
                    @if($rp->jumlah >= $rp->banyak)
                    <a href="#"><button type="button" class="btn btn-primary"><i class="fa fa-cutlery"></i> Stok Tersedia</button></a>
                    @elseif($rp->jumlah <= $rp->banyak)
                    <a href="/GIZI/jenisSajian"><button type="button" class="btn btn-danger"><i class="fa fa-cutlery"></i> Stok Kosong</button></a>
                    @endif
                  </td>
                </tr>
                @endForeach
              </tbody>
            </table>
          </div>
        </div><!--end .card-body -->
      </div>

      <div class="tab-pane" id="malam">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Rekomendasi Sajian Malam ini</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
           <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr style="background:#E0E0E0;">
                <th>No</th>
                <th>Tanggal Rekom</th>
                <th>Nama Makanan Rekom</th>
                <th>Jumlah</th>
                <th style="width:100px;">Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr style="background:#E0E0E0;">
               <th>No</th>
               <th>Tanggal Rekom</th>
               <th>Nama Makanan Rekom</th>
               <th>Jumlah</th>
               <th style="width:100px;">Aksi</th>
             </tr>
           </tfoot>
           <tbody>
            <?php $id = 1; ?>
            @foreach($rekomMalam as $rp)
            <tr>
              <td>{{$id++}}</td>
              <td>{{$rp->tgl}}</td>
              <td>{{$rp->jenis_barang}}</td>
              <td>{{$rp->banyak}}</td>
              <td>                          
                @if($rp->jumlah >= $rp->banyak)
                <a href="#"><button type="button" class="btn btn-primary"><i class="fa fa-cutlery"></i> Stok Tersedia</button></a>
                @elseif($rp->jumlah <= $rp->banyak)
                <a href="/GIZI/jenisSajian"><button type="button" class="btn btn-danger"><i class="fa fa-cutlery"></i> Stok Kosong</button></a>
                @endif
              </td>
            </tr>
            @endForeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
</div>
</div>
</section>
</div>
</div>
</div>        


@endsection
@extends('gizi.mod_tambahGudang')
@extends('gizi.mod_editGudang')

</body>
</html>


