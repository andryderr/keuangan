<!DOCTYPE html>
<html>

<link rel="stylesheet" href="{{url('../assets/cetak/pembelianBahanBaku.css')}}">


<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar')

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
        <br>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Rekap Transaksi Pembelian</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">

           <form class="form-horizontal">
            <div class="box-body col-md-5">
             <div class="form-group">
              <!-- <label>ID Supplier</label> -->
              <input style="width:120px;" type="hidden" readonly="" class="form-control" placeholder="" name="" id="">
            </div>

            <div class="input-group">
              <span class="input-group-addon" style="padding-right:38px"><strong>Nama Supplier</strong></span>
              <input class="form-control" readonly="" name="" id="" value="{{$data[0]->sup->nama_supplier}}">
              </div>
              <br>

              <div class="input-group">
              <!-- ambil tanggal ketika beli -->
                <span class="input-group-addon"><strong>Tanggal Pembelian</strong></span>
                <input type="text"  class="form-control" placeholder="" readonly name="" id="" value="{{$data[0]->tanggal_pembelian}}">  
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon" style="padding-right:42px"><strong>Nomer Faktur</strong></span>
                <input type="text"  class="form-control" placeholder="" readonly name="" id="" value="{{$data[0]->no_faktur}}">
              </div>
            </div>
          </form>
          <br>

          <div class="box-body">
            <div class="col-md-12">
              <br>
              <table id="example" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                  <tr style="background:#E0E0E0;">
                    <th>No</th>
                    <th>Bahan Baku</th>
                    <th>Satuan</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <th>Diskon RP</th>
                    <th>Diskon 1</th>
                    <th>Diskon 2</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; $subtot = 0; ?>
                  @foreach($data[0]->detpem as $row)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$row->barang->nama_barang}}</td>
                    <td>{{$row->satuan}}</td>
                    <td>{{$row->jumlah}}</td>
                    <td>{{$row->harga}}</td>
                    <td>{{$row->diskon_rp}}</td>
                    <td>{{$row->diskon_rp1}}</td>
                    <td>{{$row->diskon_rp2}}</td>
                    <td>{{$row->sub_total}}</td>
                  </tr>
                  <?php $subtot += $row->sub_total; ?>
                  @endForeach
               <br>
               <tbody class="jumlahTagihan">
                <tr>
                  <td colspan="7"></td>
                  <td><h4>Total</h4></td>
                  <td colspan="2"><h4><strong>{{$subtot}}</strong></h4></td>
                </tr>
                <tr>
                  <td colspan="7"></td>
                  <td><h5>Discount %</h5></td>
                  <td colspan="2"><h5><input style="width:150px;" type="text" class="form-control"  name="" id=""></h5></td>
                </tr>
                <tr>
                  <td colspan="7"></td>
                  <td><h5>Discount RP</h5></td>
                  <td colspan="2"><h5><input style="width:150px;" type="text" class="form-control"  name="" id=""></h5></td>
                </tr>
                <tr>
                  <td colspan="7"></td>
                  <td><h5>PPN</h5></td>
                  <td colspan="2"><h5><input style="width:50px;" placeholder="%" type="text" class="form-control"  name="" id="">
                    <input style="width:90px;" type="text" class="form-control"  name="" id=""></h5></td>
                  </tr>
                  <td colspan="7"></td>
                  <td><h3>Netto</h3></td>
                  <td colspan="2"><h3><strong>Rp. {{$data[0]->netto}}</strong></h3></td>
                </tr>
                <td>
                </tbody>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="7"></td>
                </tr>
              </tfoot>
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
