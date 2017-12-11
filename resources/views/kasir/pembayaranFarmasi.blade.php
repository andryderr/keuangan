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
          <li class="active">Pembayaran FARMASI</li>
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

          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>120</h3>
                <p>Permintaan Tagihan</p>
              </div>
              <div class="icon">
                <i class="fa fa-area-chart"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->


          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>70</h3>
                <p>Tagihan Terbayar</p>
              </div>
              <div class="icon">
                <i class="fa fa-check"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->

          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>50</h3>
                <p>Tagihan Belum Terbayar</p>
              </div>
              <div class="icon">
                <i class="fa fa-close"></i>
              </div>
              <a href="/RWINAP/dataKelas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          </div><!-- /.row -->

          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Pembayaran</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="tablenopaging" class="table table-striped table-bordered" cellspacing="0">
                  <thead class="bg-info">
                    <tr>
                      <th>No</th>
                      <th>ID Penjualan</th>
                      <th>Tgl Penjualan</th>
                      <th>Nama</th>
                      <th>Tagihan</th>
                      <th style="width:100px;">Aksi</th>
                    </tr>
                  </thead>
                  <tfoot class="bg-info">
                    <tr>
                      <th>No</th>
                      <th>ID Penjualan</th>
                      <th>Tgl Penjualan</th>
                      <th>Nama</th>
                      <th>Tagihan</th>
                      <th style="width:100px;">Aksi</th>
                    </tr>
                  </tfoot>
                  <?php 
                  $no = 1;
                  ?>
                  <tbody>
                    @foreach($penjualan as $row)
                    <tr>
                     <td>{{$no++}}</td>
                     <td>{{$row->id_penjualan_barang}}</td>
                     <td>{{$row->tanggal_penjualan}}</td>
                     @if(isset($row->resepluar->nama_pasien))
                     <td id="nama{{$row->id_penjualan_barang}}">{{$row->resepluar->nama_pasien}}</td>
                     @else
                     <td id="nama{{$row->id_penjualan_barang}}">-</td>
                     @endif
                     <td id="tot{{$row->id_penjualan_barang}}">{{$row->total}}</td>
                     <td>                          
                       <a href="#" data-toggle="tooltip" title="Pembayaran Resep"><button type="button" data-toggle="modal" data-target="#bayarFarmasi" onclick="tot({{$row->id_penjualan_barang}});" class="btn btn-success"><i class="fa fa-dollar"></i></button></a>
                       <a href="/KASIR/DetailPenjualan" data-toggle="tooltip" title="Detail Resep"><button type="button" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                     </td>
                   </tr>
                   @endForeach
                 </div>



               </tbody>
             </table>
           </div>
         </div>

       </div><!--end .card-body -->
     </div>
   </div>
 </div>
 @extends('kasir.mod_bayarFarmasi')
 <script>
  $(document).ready(function(){
    var total = 0;
  });
</script>

<script>
  function tot(id) {
    total = document.getElementById("tot"+id).innerHTML;
    var nama1 = document.getElementById("nama"+id).innerHTML;
    $("#nettotampil").val(setTitikRupiah(total));
    $("#netto").val(total);
    $("#nama_pasien").val(nama1);
    $("#id_penjualan").val(id);
  }
</script>

<script>
  function hitungKembali(){
    var netto = document.getElementById("netto").value;
    var bayar = document.getElementById("bayar1").value;
    var bayarhitung = bayar.split(".").join(""); 
    var flobayarhitung = parseFloat(bayarhitung);
    var flonetto = parseFloat(netto);
    var hasil = flobayarhitung - flonetto;
    document.getElementById("sisatagihan").value = setTitikRupiah(hasil);
    if (flobayarhitung < flonetto) {
      document.getElementById("kembali").value = 0;
    } else{
      document.getElementById("kembali").value = setTitikRupiah(hasil);
    }
  }
</script>

<script>
  document.getElementById("diskonrp").value = 0;
  function hasilNetto(){
    var diskonpersen = document.getElementById("diskonpersen").value;
    var diskonrupiah = document.getElementById("diskonrp").value; 
    var diskonrp =  diskonrupiah.split(".").join(""); 
    var ppnpersen = document.getElementById("ppnpersen").value;

    var duang = Math.round(total*(diskonpersen/100));
    document.getElementById("diskonuang").value = duang;
    var a = document.getElementById("diskonuang").value;
    var baru = parseFloat(a) + parseFloat(diskonrp);
    document.getElementById("baru").value = baru;
    var diskonuang = Math.round(total - (total*(diskonpersen/100)) - diskonrp); 
    var ppnpajak = Math.round(parseFloat(diskonuang) + (parseFloat(diskonuang)*(ppnpersen/100)));
    var netto = parseFloat(ppnpajak);
    document.getElementById("netto").value = netto;
    document.getElementById("nettotampil").value = setTitikRupiah(netto);
    document.getElementById("ppnrp").value = Math.round((parseFloat(diskonuang)*(ppnpersen/100)));
  }
</script>

<script>
  function setBayar(){
    var jumlah = document.getElementById("jumlahbayar").value;
    document.getElementById("bayar1").value = jumlah;
  }
</script>

<script>
  function jatuhTempoo(){
    var top =  document.getElementById("top").value;

    Date.prototype.addDays = function(days) {
      var dat = new Date(this.valueOf());
      dat.setDate(dat.getDate() + days);
      return dat;
    }

    var dat = new Date();
    var tgl = parseFloat(top);
    tgljatuh = dat.addDays(tgl);
    
    date = new Date(tgljatuh);
    year = date.getFullYear();
    month = date.getMonth()+1;
    dt = date.getDate();

    if (dt < 10) {
      dt = '0' + dt;
    }
    if (month < 10) {
      month = '0' + month;
    }
    console.log(year+'-' + month + '-'+dt);
    document.getElementById("jt").value = year+'-' + month + '-'+dt;
  }
</script>

<script>
  function pembayaran1()
  {
    if (document.getElementById("katPembelian").value == "Kredit") {
      document.getElementById("jatuhTempo").style.display='block';
      document.getElementById("top1").style.display='block';
      document.getElementById("viewsisatagihan").style.display='block';
      document.getElementById("viewkembali").style.display='none';
      // document.getElementById("bayar").readOnly ='false';
    } else {
      document.getElementById("jatuhTempo").style.display='none';
      document.getElementById("top1").style.display='none';
      document.getElementById("viewsisatagihan").style.display='none';
      document.getElementById("viewkembali").style.display='block';
      // document.getElementById("bayar").readOnly='false';
    }
  }
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

  var tanpa_rupiah1 = document.getElementById('diskonrp');
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