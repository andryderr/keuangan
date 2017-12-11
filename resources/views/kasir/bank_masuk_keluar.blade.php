<!DOCTYPE html>
<html>

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
                <span class="info-box-text">Bank Masuk</span>
                <span class="info-box-number" id="total_bank_masuk">Rp. </span>
              </div>
              
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-o-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bank Keluar</span>
                <span class="info-box-number" id="total_bank_keluar">Rp. </span>
              </div>
              
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Kas</span>
                <span class="info-box-number" id="total_kas_bank">Rp. </span>
              </div>
              
            </div>
          </div>

        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active bg-info"><a href="#bankmasuk" data-toggle="tab">Bank Masuk</a></li>
              <li class="bg-warning"><a href="#bankkeluar" data-toggle="tab">Bank Keluar</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="bankmasuk">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Data Bank Masuk</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#tambahBankMasuk" ><i class="fa fa-plus"></i> Tambah Bank Masuk</a>
                    <div class="form-group pull-right col-md-2">
                      <input type="search" placeholder="Cari disini" data-table="table table-striped" class="form-control no-print" placeholder="" name="" id="">
                    </div>
                    <table id="" class="table table-striped" cellspacing="0">
                      <thead class="bg-info">
                        <tr>
                          <th>No</th>
                          <th>ID. Kas Bank</th>
                          <th>Tgl Kas Bank</th>
                          <th>User</th>
                          <th>Akun</th>
                          <th>Jumlah Bayar</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $totalbankmasuk = 0;
                        $no = 1;
                        ?>
                        @foreach($bankmasuk as $bm)
                        <tr>
                         <td>{{$no++}}</td>
                         <td>{{$bm->id_bank_masuk}}</td>
                         <td>{{$bm->tgl_bank}}</td>
                         <td>{{$bm->user->name}}</td>
                         <td>{{$bm->akun->nama_akun}}</td>
                         <td>{{$bm->jumlah_bayar}}</td>
                         <td>{{$bm->keterangan}}</td>
                         <?php
                         $totalbankmasuk += (int)$bm->jumlah_bayar;
                         ?>
                       </tr>
                       @endforeach
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>

             <div class="tab-pane" id="bankkeluar">
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Data Bank Keluar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <a class="btn btn-warning" data-toggle="modal" data-target="#tambahBankKeluar" ><i class="fa fa-plus"></i> Tambah Bank Keluar</a>
                  <div class="form-group pull-right col-md-2">
                    <input type="search" placeholder="Cari disini" data-table="table table-striped table-bordered" class="form-control no-print" placeholder="" name="" id="">
                  </div>
                  <table id="" class="table table-striped table-bordered">
                    <thead class="bg-warning">
                      <tr>
                        <th>No</th>
                        <th>ID. Kas Bank</th>
                        <th>Tgl Kas Bank</th>
                        <th>User</th>
                        <th>Akun</th>
                        <th>Jumlah Bayar</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $totalbankkeluar = 0;
                      $no = 1;
                      ?>
                      @foreach($bankkeluar as $bk)
                      <tr>
                       <td>{{$no++}}</td>
                       <td>{{$bk->id_bank_keluar}}</td>
                       <td>{{$bk->tgl_bank}}</td>
                       <td>{{$bk->user->name}}</td>
                       <td>{{$bk->akun->nama_akun}}</td>
                       <td>{{$bk->jumlah_bayar}}</td>
                       <td>{{$bk->keterangan}}</td>
                       <?php
                       $totalbankkeluar += (int)$bk->jumlah_bayar;
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
@extends('kasir.mod_tambahBankMasuk')
@extends('kasir.mod_tambahBankKeluar')

<script type="text/javascript">
  $(document).ready(function(){
    var totalkas = 0;
    $('#total_bank_masuk').append(setTitikRupiah("{{$totalbankmasuk}}"));
    $('#total_bank_keluar').append(setTitikRupiah("{{$totalbankkeluar}}"));
    var totalkas = parseFloat({{$totalbankmasuk}}) - parseFloat({{$totalbankkeluar}});
    if (totalkas < 0) {
      $('#total_kas_bank').append("-"+setTitikRupiah(totalkas));
    } else {
      $('#total_kas_bank').append(setTitikRupiah(totalkas));
    }
    $('#total_saldo_awal').append("Blm Fix");
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