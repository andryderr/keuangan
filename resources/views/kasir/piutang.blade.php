<!DOCTYPE html>
<html>
@extends('attr.footer')
@extends('kasir.head')

@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('kasir.sidebar')

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
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active bg-info"><a href="#pasien" data-toggle="tab">Piutang Pasien</a></li>
              <li class="bg-warning"><a href="#transaksi" data-toggle="tab">Piutang Transaksi</a></li>
            </ul>


            <div class="tab-content">
              <div class="active tab-pane" id="pasien">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Piutang Pasien</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="" class="table datatable datable-striped table-bordered" cellspacing="0">
                      <thead class="bg-info">
                        <tr>
                          <th>No</th>
                          <th>ID Pendaf</th>
                          <th>Nama</th>
                          <th>Unit</th>
                          <th>Jatuh Tempo</th>
                          <th  style="width:150px;">Tgl Bayar</th>
                          <th>Tagihan</th>
                          <th>Sisa Tagihan</th>
                          <th style="width:80px;">Aksi</th>
                        </tr>
                      </thead>
                      <?php 
                      
                      $no = 1;
                      ?>
                      <tbody>
                        @foreach($piutang as $piu)
                        <tr>
                         <td>{{$no++}}</td>
                         <td>{{$piu->id_pendaftaran}}</td>
                         <td>{{$piu->pendaftaran->pasien->nama}}</td>
                         <td>{{$piu->pendaftaran->poli->nama_poli}}</td>
                         <td>{{$piu->tgl_jatuh_tempo}}</td>
                         <td>{{$piu->tgl_piutang}}</td>
                         <td>{{number_format($piu->tagihan,0,".",".")}}</td>
                         <td>{{number_format($piu->sisa_tagihan,0,".",".")}}</td>
                         <td>                        
                           @if($piu->sisa_tagihan <= 0)
                           <a href="#"><button type="button" class="btn btn-success">Lunas</button></a>
                           @else                         
                           <a href="#" data-toggle="tooltip" title="Pembayaran Piutang"><button type="button"  onclick="setTagihan('{{$piu->tagihan}}','{{$piu->sisa_tagihan}}','{{$piu->top}}','{{$piu->tgl_jatuh_tempo}}','{{$piu->akun->id_akun}}','{{$piu->id_piutang}}','{{$piu->id_pendaftaran}}','{{$piu->pendaftaran->pasien->nama}}');" data-toggle="modal" data-target="#bayarPiutang" class="btn btn-success"><i class="fa fa-dollar"></i></button></a>
                           <a href="#" data-toggle="tooltip" title="Detail Angsuran"><button type="button" data-toggle="modal" data-target="#detailpiutang" onclick="detailBayarPiutang('{{$piu->id_piutang}}');" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                           @endif
                         </td>
                       </tr>
                       @endforeach
                     </div>
                   </tbody>
                 </table>
               </div>
             </div>
           </div><!--end .card-body -->

           <div class="tab-pane" id="transaksi">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Piutang Transaksi</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="" class="table datatable table-striped table-bordered" cellspacing="0">
                  <thead class="bg-info">
                    <tr>
                      <th>No</th>
                      <th>ID Transaksi</th>
                      <th>Supplier</th>
                      <th>CP.</th>
                      <th>Jatuh Tempo</th>
                      <th  style="width:150px;">Tgl Bayar</th>
                      <th>Tagihan</th>
                      <th>Sisa Tagihan</th>
                      <th style="width:80px;">Aksi</th>
                    </tr>
                  </thead>
                  <?php 
                  $no = 1;
                  ?>
                  <tbody>
                    @foreach($transaksi as $tran)
                    <tr>
                     <td>{{$no++}}</td>
                     <td>{{$tran->id_transaksi}}</td>
                     <td>{{$tran->supplier->nama_supplier}}</td>
                     <td>{{$tran->supplier->contact_person}}</td>
                     <td>{{$tran->tgl_jatuh_tempo}}</td>
                     <td>{{$tran->tgl_piutang}}</td>
                     <td>{{number_format($tran->tagihan,0,".",".")}}</td>
                     <td>{{number_format($tran->sisa_tagihan,0,".",".")}}</td>
                     <td>   
                       @if($tran->sisa_tagihan <= 0)
                       <a href="#"><button type="button" class="btn btn-success">Lunas</button></a>
                       @else                       
                       <a href="#" data-toggle="tooltip" title="Pembayaran Piutang"><button type="button"  onclick="setTagihanSupp('{{$tran->tagihan}}','{{$tran->sisa_tagihan}}','{{$tran->top}}','{{$tran->tgl_jatuh_tempo}}','{{$tran->akun->id_akun}}','{{$tran->id_piutang}}','{{$tran->supplier->id_supplier}}','{{$tran->supplier->nama_supplier}}');" data-toggle="modal" data-target="#bayarPiutang" class="btn btn-success"><i class="fa fa-dollar"></i></button></a>
                       <a href="#" data-toggle="tooltip" title="Detail Angsuran"><button type="button" data-toggle="modal" data-target="#detailpiutang" onclick="detailBayarPiutang('{{$tran->id_piutang}}');" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                       @endif
                     </td>
                   </tr>
                   @endforeach
                 </div>
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
@extends('kasir.mod_bayarPiutang')
@extends('kasir.mod_detailPiutang')
<script>
  function setTagihan($tagihan, $sisatagihan, $top, $tgl_jatuhtempo,$idakun,$idpiutang,$id_pendaf,$nama){
    document.getElementById("tagihan").value = setTitikRupiah($tagihan);
    document.getElementById("dibayar").value = setTitikRupiah($sisatagihan);
    document.getElementById("top").value = $top;
    document.getElementById("jt").value =  $tgl_jatuhtempo;
    document.getElementById("netto").value = $sisatagihan;
    document.getElementById("namaakun").value = $idakun;
    document.getElementById("idpiutang").value = $idpiutang;
    document.getElementById("nama").value = $nama;
    document.getElementById("id_pendaf").value = $id_pendaf;
    document.getElementById("id_supplier").value = "NULL";
  }
</script>
<script>
  function setTagihanSupp($tagihan, $sisatagihan, $top, $tgl_jatuhtempo,$idakun,$idpiutang,$id_pendaf,$nama){
    document.getElementById("tagihan").value = setTitikRupiah($tagihan);
    document.getElementById("dibayar").value = setTitikRupiah($sisatagihan);
    document.getElementById("top").value = $top;
    document.getElementById("jt").value =  $tgl_jatuhtempo;
    document.getElementById("netto").value = $sisatagihan;
    document.getElementById("namaakun").value = $idakun;
    document.getElementById("idpiutang").value = $idpiutang;
    document.getElementById("nama").value = $nama;
    document.getElementById("id_supplier").value = $id_pendaf
    document.getElementById("id_pendaf").value = "NULL";
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
    if (flobayarhitung > flonetto) {
      document.getElementById("sisatagihan").value = 0;
    } else{
      document.getElementById("sisatagihan").value = setTitikRupiah(hasil);
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

<script type="text/javascript">
  function detailBayarPiutang(id)
  {
    var view_url = "{{url('G/detailPiutang/')}}";
    $.ajax({
      url: view_url,
      type:"GET",
      data: {"id":id},
      success: function(result){
       console.log(result);
       $("#detailPiutang").empty();
       $i = 1;
       result.forEach(function(r){
        $("#detailPiutang").append("<tr><td>"+($i++)+"</td><td>"+r['tgl_bayar']+"</td><td>"+setTitikRupiah(r['jumlah_bayar'])+"</td><td>"+setTitikRupiah(r['sisa_tagihan'])+"</td><td><a href='#'><button type='button' onclick='return confirm('Hapus Data Ini ?');' class='btn btn-danger'><i class='fa fa-trash'></i></button></a></td></tr>");
      });
     }
   });
  }
</script>
@endsection
</body>
</html>