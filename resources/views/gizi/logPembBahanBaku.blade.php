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
          <li class="active">Pembelian Bahan Baku</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Riwayat Pembelian Bahan Baku</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>ID Bahan Baku</th>
                  <th>Bahan Baku</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Gudang</th>
                  <th>Pembeli</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                 <th>ID Bahan Baku</th>
                  <th>Bahan Baku</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Gudang</th>
                  <th>Pembeli</th>
               </tr>
             </tfoot>
             <tbody>
              <tr>
                <td>ij12</td>
                <td>Beras</td>
                <td>Kg</td>
                <td>120</td>
                <td>Gudang 1</td>
                <td>Sopian</td>
              </tr>
              <tr>
                <td>ij12</td>
                <td>Ayam</td>
                <td>Kg</td>
                <td>12</td>
                <td>Gudang 2</td>
                <td>Iqbal</td>
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