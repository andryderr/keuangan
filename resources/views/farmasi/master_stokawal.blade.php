<!-- <link rel="stylesheet" href="{{url('../assets/cetak/pembelianBahanBaku.css')}}"> -->

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
         <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
      </div> <!-- end .flash-message -->
        
        <br>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Master Stok Awal Gudang</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">

            <div class="form-group col-md-6 col-md-push-3 text-center">
                <label style="text-align: center;">Nama Gudang</label>
                <div class="input-group col-md-6 col-md-push-3">
                  <select class="form-control" name="" id="cari_gudang" onchange="setCari();">
                  <option value="all">Semua</option>
                   @foreach($data as $dg)
                   @if($dg->id_gudang == $id)
                   <option value="{{$dg->id_gudang}}" selected>{{$dg->nama_gudang}}</option>
                   @else
                   <option value="{{$dg->id_gudang}}">{{$dg->nama_gudang}}</option>
                   @endif
                   @endforeach
                 </select>
                 <span class="input-group-btn">
                 <a href="#" class="btn btn-success btn-md" id="pencarian"> <i class="glyphicon glyphicon-search"></i></a>
                </span>
              </div>
          </div>
        </div>


        <div class="box-body">
          <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahMasterStokAwal" id="tomboltambah"> <i class="glyphicon glyphicon-plus"></i> Tambah Stok Awal</a>
          <br>
          <br>
          <table id="" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr class="bg-info">
                <th>No</th>
                <th>No Akun</th>
                <th>Nama Gudang</th>
                <th>Tanggal Stok Awal</th>
                <th>Total Jenis Item</th>
                <th>Total Stok</th>
                <th>Total Harga Stok</th>
                <th style="width: 100px;">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php $no = 1; ?>
               @foreach($masterstokawal as $msa)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$msa->id_stokawal}}</td>
                <td>{{$msa->gudang->nama_gudang}}</td>
                <td>{{$msa->tgl_stokawal}}</td>
                <td>{{$totalbarang}}</td>
                <td>{{$totalstok}}</td>
                <td>{{$msa->total_stokawal}}</td>
                <td> 
                @if($msa->total_stokawal == 0)
                 <a href="/FARMASI/detailStokAwal/{{$msa->id_stokawal}}" data-toggle="tooltip" title="Detail Stok Awal"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i></button></a>          
                 <a href="/FARMASI/hapusMasterStokAwal/{{$msa->id_stokawal}}" data-toggle="tooltip" title="Hapus Stok Awal" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                @else
                 <a href="/FARMASI/detailStokAwal/{{$msa->id_stokawal}}"><button type="button" class="btn btn-success">Stok Awal Selesai</button></a>   
                @endif
               </td>
             </tr>
             @endforeach
         </tbody>
       </table>
     </div>

   </div><!--end .card-body -->
 </div>
</div>
</div>
@extends('farmasi.mod_tambahmasterstokawal')
<script>
function setCari() {
  var e = document.getElementById("cari_gudang");
  $a = e.options[e.selectedIndex].value;
  if ($a=='all') {
  $('#pencarian').attr("href","{{url('FARMASI/masterStokAwal')}}");
  }else{ 
  $('#pencarian').attr("href","{{url('FARMASI/masterStokAwal')}}/"+$a);
  }
} 

</script>
@endsection
