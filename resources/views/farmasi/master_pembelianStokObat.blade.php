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
          <li class="active">Master Pembelian</li>
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
              <h3 class="box-title">Data Master Pembelian</h3>
            </div><!-- /.box-header -->

            <div class="form-group col-md-12 text-center">
              <label for="nama_grup">Nama Supplier</label>
              <div class="input-group col-md-7">
                <div class="col-md-5"></div>           
                <select for="nama_grup" style="width:200px; margin-right:auto; margin-left:auto; border:1px solid #000;" name="nama_grup" id="id_supplier1" class="form-control text-center" onchange="setA();">
                 @if($status == 0)
                 <option value="">---</option>
                 @foreach($supplier as $sup)
                 <option value="{{$sup->id_supplier}}">{{$sup->nama_supplier}}</option>
                 @endforeach
                 @else
                 <option value="{{$data[0]->id_supplier}}">{{$data[0]->nama_supplier}}</option>
                 @endif
               </select>
               @if($status == 0)
               <a href="#" class="btn btn-success btn-md" id="pencarian"> <i class="glyphicon glyphicon-search"></i></a>
               <a href="" class="btn btn-primary btn-md" data-toggle = "modal" data-target = "#tambahSupplier"> <i class="glyphicon glyphicon-plus"></i> Supplier</a>
               @endif
             </div>
           </div>

           <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
              <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahMaster" id="tombolTambahMaster"> <i class="glyphicon glyphicon-plus"></i> Tambah Master Pembelian</a>
              <br>
              <br>
            </form>
            <table id="asd" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>No Entri</th>
                  <th>No Faktur</th>
                  <th>Tanggal</th>
                  <th>Netto(Rp)</th>
                  <th style="width:150px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>No Entri</th>
                  <th>No Faktur</th>
                  <th>Tanggal</th>
                  <th>Netto(Rp)</th>
                  <th style="width:150px;">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $no = 1; ?>
                @foreach($master as $m)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$m->id_pembelian_barang}}</td>
                  <td>{{$m->no_faktur}}</td>
                  <td>{{$m->tanggal_pembelian}}</td>
                  <td>{{number_format($m->netto,0,".",".")}}</td>
                  <td>                                       
                    @if($m->total == null)         
                    <a href="{{url('/FARMASI/BeliStok')}}/{{$m->id_pembelian_barang}}" data-toggle="tooltip" title="Pembelian"><button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button></a>
                    <a href="{{url('/FARMASI/hapusMaster')}}/{{$m->id_pembelian_barang}}" data-toggle="tooltip" title="Hapus Pembelian" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
@extends('farmasi.mod_tambahMasterPembelian')
@extends('farmasi.mod_tambahSupplier')

<script>
function setA() {
  var e = document.getElementById("id_supplier1");
  $a = e.options[e.selectedIndex].value;
  $('#pencarian').attr("href","{{url('FARMASI/masterPembelian')}}/"+$a);
} 
</script>

</body>
</html>
