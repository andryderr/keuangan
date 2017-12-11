
<link rel="stylesheet" href="{{url('../assets/cetak/cetakBilling.css')}}">


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
        <br>

        <div class="col-md-6 no-print">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Filter</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form action="{{url('KASIR/filterLaporanHarian')}}" method="get">
              {{csrf_field()}}
              <div class="form-group col-md-6">
                <label>ID Akun</label>
                <select class="form-control" name="akun" id="pilihAkun">
                  <option value="semua">Semua Akun</option>
                  @foreach($akun as $ak)
                  <option value="{{$ak->id_akun}}">{{$ak->nama_akun}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
                <label>Tanggal</label>
                @if(isset($_GET['tanggal']))
                <input type="text" class="form-control" placeholder="" value="{{$_GET['tanggal']}}" name="tanggal" id="rangetanggal">
                @else
                <input type="text" class="form-control" placeholder="" name="tanggal" id="rangetanggal">
                @endif
              </div>
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary pull-right">Cari</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br>

      <div class="col-md-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <img class="logoRS" src="{{('/dist/img/logo.png')}}">
            <h3 class="namaRS">RUMAH SAKIT UMUM BAKTI MULIA - MMC</h3>
            <h6 class="alamatRS">Jl. BRAWIJAYA NO. 46-48 MUNCAR Telp.(0333)-590001, HP:0852 597 025 24/ 0878 579 844 50
              <br>61451 BANYUWANGI</h6>
              <br>
              <hr class="garis">
              <a class="btn btn-primary btn-lg col-sm-1 pull-left no-print" onclick="print();"><i class="fa fa-print fa-lg"></i></a>

              <div id="periodePerawatan">
                <label>Tanggal Cetak : 
                  <br>
                  <?php
                  date_default_timezone_set('Asia/Jakarta');
                  $tanggal = date('d-m-Y G:i:s');
                  echo($tanggal)
                  ?>
                </label>
              </div>
              <h3 class="judul1">Laporan Kas Harian</h3>


              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <!-- <div class="table-responsive"> -->
              <div class="form-group pull-right col-md-3">
                <input type="search" placeholder="Cari disini" data-table="table table-bordered" class="form-control no-print" placeholder="" name="" id="">
              </div>
              <table id="" class="table table-striped table-bordered col-md-12"  style="font-size: 12px;">
                <thead>
                  <?php $no=1; ?>
                  <tr style="background:#E0E0E0;">
                    <th>No</th>
                    <th style="width: 150px;">Customer/Supplier</th>
                    <th style="width: 250px;">Jenis Transaksi</th>
                    <th>ID Akun</th>
                    <th>ID Kas(M/K)</th>
                    <th>ID transaksi</th>
                    <th>User</th>
                    <th style="width: 150px;">Tgl</th>
                    <th style="width: 550px;">Keterangan</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Saldo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $saldoawal = $saldoawal[0]->saldoawal;
                  $sisasaldo = $saldoawal;
                  $no = 1;
                  $totalsaldomasuk = 0;
                  $totalsaldoawal = 0;
                  $totalsaldokeluar = 0;
                  $user = 'diisi user';
                  ?>
                  @foreach($data as $row)
                  <tr>
                   <td>{{$no++}}</td>

                   @if($row->id_supplier)
                   <td>{{$row->supplier->nama_supplier}}</td>
                   @elseif($row->id_customer)
                   <td>{{$row->customer->nama_cust}}</td>
                   @elseif($row->id_pendaftaran)
                   <td>{{$row->pendaf->pasien->nama}}</td>
                   @else
                   <td>{{$row->user->name}}</td>
                   @endif
                   <td>{{$row->jenis_transaksi}}</td>
                   <td>{{$row->id_akun}}</td>
                   @if(!$row->id_kas_masuk)
                   <td>{{$row->id_kas_keluar}}</td>
                   @else
                   <td>{{$row->id_kas_masuk}}</td>
                   @endif
                   <td>{{$row->id_transaksi}}</td>
                   <td>{{$row->user->name}}</td>
                   <td>{{$row->tgl_kas_harian}}</td>
                   <td style="width:350px;"><label id="">{{$row->keterangan}}</label>(<label id="">@if($row->id_supplier){{$row->supplier->nama_supplier}}@elseif($row->id_customer){{$row->customer->nama_cust}}@elseif($row->id_pendaftaran){{$row->pendaf->pasien->nama}}@else {{$row->user->name}} @endif</label> - {{$row->id_transaksi}}) </td>
                   <td class="ratarupiah">{{number_format($row->saldo_masuk,0,".",".")}}</td>
                   <td class="ratarupiah">{{number_format($row->saldo_keluar,0,".",".")}}</td>
                   <td>
                     <?php
                     $sisasaldo = $sisasaldo + ($row->saldo_masuk - $row->saldo_keluar);
                     echo number_format($sisasaldo,0,".",".");
                     ?>
                   </td>
                   <?php 
                   $totalsaldomasuk += $row->saldo_masuk;
                   $totalsaldokeluar += $row->saldo_keluar;
                   ?>
                 </tr>
                 @endForeach
               </tbody>
             </table>
             <!-- </div> -->
           </div>
         </div>
       </div><!--end .card-body -->

       <div class="col-md-5 pull-right">
        <div class="box box-default" style="font-size: 12px;">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
           <div class="form-group col-md-12">
            <label>Saldo Awal</label>
            <input type="text" readonly="" class="form-control ratarupiah" style="font-size:30px; font-weight:bold;" placeholder="" value="{{number_format($saldoawal,0,".",".")}}" name="saldo_awal">
          </div>

          <div class="form-group col-md-6">
            <label>Saldo Masuk</label>
            <input type="text" readonly="" style="font-size:20px; font-weight:bold;" class="form-control ratarupiah col-md-5" value="{{number_format($totalsaldomasuk,0,".",".")}}" name="saldo_masuk" id="">
          </div>

          <div class="form-group col-md-6">
            <label>Saldo Keluar</label>
            <input type="text" readonly="" style="font-size:20px; font-weight:bold;" class="form-control ratarupiah col-md-5" value="{{number_format($totalsaldokeluar,0,".",".")}}" name="saldo_keluar" id="">
          </div>

          <div class="form-group col-md-12" id="viewsisatagihan">
            <label>Saldo Akhir</label>
            <input type="text" style="font-size:30px; font-weight:bold;" readonly="" class="form-control ratarupiah col-md-5" value="{{number_format($sisasaldo,0,".",".")}}"  name="saldo_akhir" id="">
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
</div>
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
