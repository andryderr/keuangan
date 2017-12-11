<!DOCTYPE html>
<html>
<style type="text/css">
  .ratarupiah{
    text-align: right;
  }
</style>
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
        <div class="row">

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-blue"><i class="fa fa-arrow-circle-o-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kas Masuk</span>
                <span class="info-box-number" id="total_km">Rp. </span>
              </div>
              <!— /.info-box-content —>
            </div>
            <!— /.info-box —>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-o-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kas Keluar</span>
                <span class="info-box-number" id="total_kk">Rp. </span>
              </div>
              <!— /.info-box-content —>
            </div>
            <!— /.info-box —>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Kas Semua Akun</span>
                <span class="info-box-number" id="total_kmk">Rp. </span>
              </div>
              <!— /.info-box-content —>
            </div>
            <!— /.info-box —>
          </div>

          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active bg-info"><a href="#kasmasuk" data-toggle="tab">Kas Masuk</a></li>
                <li class="bg-warning"><a href="#kaskeluar" data-toggle="tab">Kas Keluar</a></li>
              </ul>

              <div class="tab-content">
                <div class="active tab-pane" id="kasmasuk">
                  <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title">Data Kas Masuk</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <a class="btn btn-primary" data-toggle="modal" data-target="#tambahKasMasuk" ><i class="fa fa-plus"></i> Tambah Kas Masuk</a>
                      <div class="form-group pull-right col-md-2">
                        <input type="search" placeholder="Cari disini" data-table="table table-striped" class="form-control no-print" placeholder="" name="" id="">
                      </div>
                      <table id="" class="table table-striped" cellspacing="0">
                        <thead class="bg-info">
                          <tr>
                            <th>No</th>
                            <th>ID. Kas</th>
                            <th>Tgl Kas</th>
                            <th>User</th>
                            <th style="width: 100px;">Pend./Supp./User.</th>
                            <th>Akun</th>
                            <th>Tagihan</th>
                            <th>Jumlah Bayar</th>
                            <th>Sisa Tagihan</th>
                            <th>Tgl Pelunasan</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $totalkasmasuk = 0;
                          $no = 1;
                          ?>
                          @foreach($kasmasuk as $km)
                          <tr>
                           <td>{{$no++}}</td>
                           <td>{{$km->id_kas_masuk}}</td>
                           <td>{{$km->tgl_kas}}</td>
                           <td>{{$km->user->name}}</td>
                           <td>@if($km->id_supplier){{$km->supplier->nama_supplier}}@elseif($km->id_customer){{$km->customer->nama_cust}}@elseif($km->id_pendaftaran){{$km->pendaf->pasien->nama}}@else {{$km->user->name}} @endif</td>
                           <td>{{$km->akun->nama_akun}}</td>
                           <td class="ratarupiah">{{number_format($km->tagihan,0,".",".")}}</td>
                           <td class="ratarupiah">{{number_format((float)$km->jumlah_bayar,0,".",".")}}</td>
                           <td class="ratarupiah">{{number_format((float)$km->sisa_tagihan,0,".",".")}}</td>
                           <td>{{$km->tgl_jatuh_tempo}}</td>
                           <td>{{$km->keterangan}}</td>
                           <?php
                           $totalkasmasuk += (int)$km->jumlah_bayar;
                           ?>
                         </tr>
                         @endforeach
                       </tbody>
                     </table>
                   </div>
                 </div>
               </div>

               <div class="tab-pane" id="kaskeluar">
                <div class="box box-warning">
                  <div class="box-header">
                    <h3 class="box-title">Data Kas Keluar</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <a class="btn btn-warning" data-toggle="modal" data-target="#tambahKasKeluar" ><i class="fa fa-plus"></i> Tambah Kas Keluar</a>
                    <div class="form-group pull-right col-md-2">
                      <input type="search" placeholder="Cari disini" data-table="table table-striped table-bordered" class="form-control no-print" placeholder="" name="" id="">
                    </div>
                    <table id="" class="table table-striped table-bordered">
                      <thead class="bg-warning">
                        <tr>
                          <th>No</th>
                          <th>ID. Kas</th>
                          <th>Tgl Kas</th>
                          <th>User</th>
                          <th style="width: 100px;">Pend./Supp./User.</th>
                          <th>Akun</th>
                          <th>Tagihan</th>
                          <th>Jumlah Bayar</th>
                          <th>Sisa Tagihan</th>
                          <th>Tgl Pelunasan</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $totalkaskeluar = 0;
                        $no = 1;
                        ?>
                        @foreach($kaskeluar as $kk)
                        <tr>
                         <td>{{$no++}}</td>
                         <td>{{$kk->id_kas_keluar}}</td>
                         <td>{{$kk->tgl_kas}}</td>
                         <td>{{$kk->user->name}}</td>
                         <td>@if($kk->id_supplier){{$kk->supplier->nama_supplier}}@elseif($kk->id_customer){{$kk->customer->nama_cust}}@elseif($kk->id_pendaftaran){{$kk->pendaf->pasien->nama}}@else {{$kk->user->name}} @endif</td>
                         <td>{{$kk->akun->nama_akun}}</td>
                         <td class="ratarupiah">{{number_format($kk->tagihan,0,".",".")}}</td>
                         <td class="ratarupiah">{{number_format($kk->jumlah_bayar,0,".",".")}}</td>
                         <td class="ratarupiah">{{number_format($kk->sisa_tagihan,0,".",".")}}</td>
                         <td>{{$kk->tgl_jatuh_tempo}}</td>
                         <td>{{$kk->keterangan}}</td>
                         <?php
                         $totalkaskeluar += (int)$kk->jumlah_bayar;
                         ?>
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
     </section>
   </div>
 </div>
</div> 
@extends('kasir.mod_tambahKasMasuk')
@extends('kasir.mod_tambahKasKeluar')

<script type="text/javascript">
  $(document).ready(function(){
    var totalkas = 0;
    $('#total_km').append(setTitikRupiah("{{$totalkasmasuk}}"));
    $('#total_kk').append(setTitikRupiah("{{$totalkaskeluar}}"));
    var totalkas = parseFloat({{$totalkasmasuk}}) - parseFloat({{$totalkaskeluar}});
    if (totalkas < 0) {
      $('#total_kmk').append("-"+setTitikRupiah(totalkas));
    } else {
      $('#total_kmk').append(setTitikRupiah(totalkas));
    }
    $('#total_sa').append("Blm Fix");
  });
</script>
<script>
  function setTitikRupiah($rupiah){
    var bilangan = $rupiah;
    var reverse = bilangan.toString().split('').reverse().join(''),
    ribuan  = reverse.match(/\d{1,3}/g);
    ribuan  = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }
</script>
<script type="text/javascript">
  /* Tanpa Rupiah */
  var tanpa_rupiah = document.getElementById('bayar1');
  tanpa_rupiah.addEventListener('keyup', function(e)
  {
    tanpa_rupiah.value = formatRupiah(this.value);
  });

  var tanpa_rupiah1 = document.getElementById('bayar2');
  tanpa_rupiah1.addEventListener('keyup', function(e)
  {
    tanpa_rupiah1.value = formatRupiah(this.value);
  });

  /* Fungsi */
  function formatRupiah(angka, prefix)
  {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa  = split[0].length % 3,
    rupiah  = split[0].substr(0, sisa),
    ribuan  = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>

@endsection
</body>
</html>