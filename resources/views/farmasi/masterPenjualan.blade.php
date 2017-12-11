<!DOCTYPE html>
<html>
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
          <li class="">Dashboard</li>
          <li class="active">Master Penjualan</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
          @endforeach
        </div> <!-- end .flash-message -->  
        <br>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Master Penjualan</h3>
            </div><!-- /.box-header -->

           <div class="box-body">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>No Entri</th>
                  <th>Tanggal</th>
                  <th>Total(Rp)</th>
                  <th style="width:150px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>No Entri</th>
                  <th>Tanggal</th>
                  <th>Total(Rp)</th>
                  <th style="width:150px;">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $no = 1; ?>
                @foreach($master as $m)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$m->id_penjualan_barang}}</td>
                  <td>{{$m->tanggal_penjualan}}</td>
                  <td>{{number_format($m->total,0,".",".")}}</td>
                  <td>                                       
                    @if($m->total == 0)         
                    <a href="{{url('/FARMASI/penjualanObat')}}/{{$m->id_penjualan_barang}}" data-toggle="tooltip" title="Penjualan Barang"><button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button></a>
                    <a href="{{url('/FARMASI/hapusMasterPenjualan')}}/{{$m->id_penjualan_barang}}" data-toggle="tooltip" title="Hapus Penjualan" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    @else
                    <button type="button" class="btn btn-success">Transaksi Selesai</button>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div><!--end .card-body -->
    </div>
  </div>
</div>

@endsection

<script>
function setA() {
  var e = document.getElementById("id_supplier1");
  $a = e.options[e.selectedIndex].value;
  $('#pencarian').attr("href","{{url('FARMASI/masterPembelian')}}/"+$a);
} 
</script>

</body>
</html>
